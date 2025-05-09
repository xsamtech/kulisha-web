<?php

namespace App\Http\Controllers\API;

use App\Models\Event;
use App\Models\File;
use App\Models\Group;
use App\Models\History;
use App\Models\Notification;
use App\Models\Status;
use App\Models\Subscription;
use App\Models\Type;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Resources\Event as ResourcesEvent;
use App\Http\Resources\User as ResourcesUser;

/**
 * @author Xanders
 * @see https://team.xsamtech.com/xanderssamoth
 */
class EventController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = Event::orderByDesc('created_at')->paginate(30);
        $count_events = Event::count();

        return $this->handleResponse(ResourcesEvent::collection($events), __('notifications.find_all_events_success'), $events->lastPage(), $count_events);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Groups
        $susbcription_status_group = Group::where('group_name->fr', 'Etat de la souscription')->first();
        $notification_status_group = Group::where('group_name->fr', 'Etat de la notification')->first();
        $history_status_group = Group::where('group_name->fr', 'Etat de l’historique')->first();
        $event_status_group = Group::where('group_name->fr', 'Etat de l’événement')->first();
        $history_type_group = Group::where('group_name->fr', 'Type d’historique')->first();
        $notification_type_group = Group::where('group_name->fr', 'Type de notification')->first();
        $access_type_group = Group::where('group_name->fr', 'Type d’accès')->first();
        // Status
        $accepted_status = Status::where([['status_name->fr', 'Acceptée'], ['group_id', $susbcription_status_group->id]])->first();
        $unread_notification_status = Status::where([['status_name->fr', 'Non lue'], ['group_id', $notification_status_group->id]])->first();
        $unread_history_status = Status::where([['status_name->fr', 'Non lue'], ['group_id', $history_status_group->id]])->first();
        $in_preparation_for_status = Status::where([['status_name->fr', 'En préparation'], ['group_id', $event_status_group->id]])->first();
        // Type
        $public_type = Type::where([['type_name->fr', 'Public'], ['group_id' => $access_type_group->id]])->first();
        $activities_history_type = Type::where([['type_name->fr', 'Historique des activités'], ['group_id', $history_type_group->id]])->first();
        $new_event_type = Type::where([['type_name->fr', 'Nouvel événement'], ['group_id', $notification_type_group->id]])->first();
        // Get inputs
        $inputs = [
            'event_title' => $request->event_title,
            'event_description' => $request->event_description,
            'start_at' => $request->start_at,
            'end_at' => $request->end_at,
            'timezone' => isset($request->timezone) ? $request->timezone : 1,
            'is_virtual' => isset($request->is_virtual) ? $request->is_virtual : 1,
            'event_place' => $request->event_place,
            'type_id' => isset($request->type_id) ? $request->type_id : $public_type->id,
            'status_id' => isset($request->status_id) ? $request->status_id : $in_preparation_for_status->id,
            'user_id' => $request->user_id
        ];

        if (trim($inputs['event_title']) == null) {
            return $this->handleError(__('miscellaneous.found_value') . ' ' . $inputs['event_title'], __('miscellaneous.public.events.data.event_title.error'), 400);
        }

        if (trim($inputs['start_at']) == null) {
            return $this->handleError(__('miscellaneous.found_value') . ' ' . $inputs['start_at'], __('miscellaneous.public.events.data.date_start.error'), 400);
        }

        // if (trim($inputs['end_at']) == null) {
        //     return $this->handleError(__('miscellaneous.found_value') . ' ' . $inputs['end_at'], __('miscellaneous.public.events.data.date_end.error'), 400);
        // }

        $request->validate([
            'timezone' => 'required|timezone'
        ]);

        $event = Event::create($inputs);

        if ($request->fields_ids != null) {
            $event->fields()->sync($request->fields_ids);
        }

        if (isset($request->image_64)) {
            // $extension = explode('/', explode(':', substr($request->image_64, 0, strpos($request->image_64, ';')))[1])[1];
            $replace = substr($request->image_64, 0, strpos($request->image_64, ',') + 1);
            // Find substring from replace here eg: data:image/png;base64,
            $image = str_replace($replace, '', $request->image_64);
            $image = str_replace(' ', '+', $image);
            // Create image URL
            $image_url = 'images/events/' . $event->id . '/cover/' . Str::random(50) . '.png';

            // Upload image
            Storage::url(Storage::disk('public')->put($image_url, base64_decode($image)));

            $event->update([
                'cover_photo_path' => $image_url,
                'cover_coordinates' => $request->x . '-' . $request->y . '-' . $request->width . '-' . $request->height,
                'updated_at' => now()
            ]);
        }

        /*
            HISTORY AND/OR NOTIFICATION MANAGEMENT
        */
        // The event is public
        if ($event->type_id == $public_type->id) {
            // Find all subscribers of the event owner
            $subscriptions = Subscription::where([['user_id', $event->user_id], ['status_id', $accepted_status->id]])->get();

            if ($subscriptions != null) {
                foreach ($subscriptions as $subscription):
                    Notification::create([
                        'type_id' => $new_event_type->id,
                        'status_id' => $unread_notification_status->id,
                        'from_user_id' => $event->user_id,
                        'to_user_id' => $subscription->subscriber_id
                    ]);
                endforeach;

            } else {
                Notification::create([
                    'type_id' => $new_event_type->id,
                    'status_id' => $unread_notification_status->id,
                    'from_user_id' => $event->user_id,
                ]);
            }

            $notification = Notification::where([['type_id', $new_event_type->id], ['from_user_id', $event->user_id]])->first();

            History::create([
                'type_id' => $activities_history_type->id,
                'status_id' => $unread_history_status->id,
                'from_user_id' => $event->user_id,
                'for_notification_id' => $notification->id
            ]);
        }

        return $this->handleResponse(new ResourcesEvent($event), __('notifications.create_event_success'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        // Groups
        $susbcription_status_group = Group::where('group_name->fr', 'Etat de la souscription')->first();
        $event_status_group = Group::where('group_name->fr', 'Etat de l’événement')->first();
        $notification_status_group = Group::where('group_name->fr', 'Etat de la notification')->first();
        $history_type_group = Group::where('group_name->fr', 'Type d’historique')->first();
        $notification_type_group = Group::where('group_name->fr', 'Type de notification')->first();
        // Status
        $accepted_status = Status::where([['status_name->fr', 'Acceptée'], ['group_id', $susbcription_status_group->id]])->first();
        $unread_notification_status = Status::where([['status_name->fr', 'Non lue'], ['group_id', $notification_status_group->id]])->first();
        $started_status = Status::where([['status_name->fr', 'Commencé'], ['group_id', $event_status_group->id]])->first();
        $ended_status = Status::where([['status_name->fr', 'Terminé'], ['group_id', $event_status_group->id]])->first();
        // Types
        $search_history_type = Type::where([['type_name->fr', 'Historique des recherches'], ['group_id', $history_type_group->id]])->first();
        $searched_event_type = Type::where([['type_name->fr', 'Evénement recherché'], ['group_id', $notification_type_group->id]])->first();
        $started_event_type = Type::where([['type_name->fr', 'Evénement commencé'], ['group_id', $notification_type_group->id]])->first();
        $ended_event_type = Type::where([['type_name->fr', 'Evénement terminé'], ['group_id', $notification_type_group->id]])->first();
        // Request
        $event = Event::find($id);

        if (is_null($event)) {
            return $this->handleError(__('notifications.find_event_404'));
        }

        // If the date of the event is arrived
        if (date_timestamp_get($event->start_at) >= date_timestamp_get(now()) AND date_timestamp_get($event->end_at) < date_timestamp_get(now())) {
            if ($event->status_id != $started_status->id) {
                $event->update([
                    'status_id' => $started_status->id,
                    'updated_at' => now()
                ]);

                /*
                    HISTORY AND/OR NOTIFICATION MANAGEMENT
                */
                // Find all subscribers of the event owner
                $subscriptions = Subscription::where([['user_id', $event->user_id], ['status_id', $accepted_status->id]])->get();

                if ($subscriptions != null) {
                    foreach ($subscriptions as $subscription):
                        Notification::create([
                            'type_id' => $started_event_type->id,
                            'status_id' => $unread_notification_status->id,
                            'from_user_id' => $event->user_id,
                            'to_user_id' => $subscription->subscriber_id,
                            'event_id' => $event->id
                        ]);
                    endforeach;
                }
            }
        }

        // If the date of the event is passed
        if (date_timestamp_get($event->end_at) >= date_timestamp_get(now())) {
            if ($event->status_id != $ended_status->id) {
                $event->update([
                    'status_id' => $ended_status->id,
                    'updated_at' => now()
                ]);

                /*
                    HISTORY AND/OR NOTIFICATION MANAGEMENT
                */
                // Find all subscribers of the event owner
                $subscriptions = Subscription::where([['user_id', $event->user_id], ['status_id', $accepted_status->id]])->get();

                if ($subscriptions != null) {
                    foreach ($subscriptions as $subscription):
                        Notification::create([
                            'type_id' => $ended_event_type->id,
                            'status_id' => $unread_notification_status->id,
                            'from_user_id' => $event->user_id,
                            'to_user_id' => $subscription->subscriber_id,
                            'event_id' => $event->id
                        ]);
                    endforeach;
                }
            }
        }

        /*
            HISTORY AND/OR NOTIFICATION MANAGEMENT
        */
        if ($request->has('origin')) {
            if ($request->input('origin') == 'search') {
                $notification = Notification::create([
                    'type_id' => $searched_event_type->id,
                    'status_id' => $unread_notification_status->id,
                    'from_user_id' => $request->has('visitor_id') ? $request->get('visitor_id') : null,
                    'to_user_id' => $event->user_id,
                    'event_id' => $event->id
                ]);

                History::create([
                    'search_content' => $event->event_title,
                    'type_id' => $search_history_type->id,
                    'from_user_id' => $request->has('visitor_id') ? $request->get('visitor_id') : null,
                    'for_notification_id' => $notification->id
                ]);
            }
        }

        return $this->handleResponse(new ResourcesEvent($event), __('notifications.find_event_success'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Event $event)
    {
        // Groups
        $susbcription_status_group = Group::where('group_name->fr', 'Etat de la souscription')->first();
        $notification_status_group = Group::where('group_name->fr', 'Etat de la notification')->first();
        $history_status_group = Group::where('group_name->fr', 'Etat de l’historique')->first();
        $history_type_group = Group::where('group_name->fr', 'Type d’historique')->first();
        $notification_type_group = Group::where('group_name->fr', 'Type de notification')->first();
        // Statuses
        $accepted_status = Status::where([['status_name->fr', 'Acceptée'], ['group_id', $susbcription_status_group->id]])->first();
        $unread_notification_status = Status::where([['status_name->fr', 'Non lue'], ['group_id', $notification_status_group->id]])->first();
        $unread_history_status = Status::where([['status_name->fr', 'Non lue'], ['group_id', $history_status_group->id]])->first();
        // Types
        $activities_history_type = Type::where([['type_name->fr', 'Historique des activités'], ['group_id', $history_type_group->id]])->first();
        $event_title_updated_type = Type::where([['type_name->fr', 'Titre d’événement modifié'], ['group_id', $notification_type_group->id]])->first();
        // Get inputs
        $inputs = [
            'id' => $request->id,
            'event_title' => $request->event_title,
            'event_description' => $request->event_description,
            'start_at' => $request->start_at,
            'end_at' => $request->end_at,
            'timezone' => $request->timezone,
            'is_virtual' => $request->is_virtual,
            'event_place' => $request->event_place,
            'type_id' => $request->type_id,
            'status_id' => $request->status_id,
            'user_id' => $request->user_id
        ];
        // Select specific event to check unique constraint
        $current_event = Event::find($inputs['id']);

        if (is_null($current_event)) {
            return $this->handleError(__('notifications.find_event_404'));
        }

        if ($inputs['event_title'] != null) {
            if ($current_event->event_title != $inputs['event_title']) {
                if (trim($inputs['event_title']) == null) {
                    return $this->handleError(__('miscellaneous.found_value') . ' ' . $inputs['event_title'], __('miscellaneous.public.events.data.event_title.error'), 400);
                }
            }

            $event->update([
                'event_title' => $inputs['event_title'],
                'former_event_title' => $current_event->event_title,
                'updated_at' => now()
            ]);

            /*
                HISTORY AND/OR NOTIFICATION MANAGEMENT
            */
            // Find all subscribers of the event owner
            $subscriptions = Subscription::where([['user_id', $current_event->user_id], ['status_id', $accepted_status->id]])->get();

            if ($subscriptions != null) {
                foreach ($subscriptions as $subscription):
                    Notification::create([
                        'type_id' => $event_title_updated_type->id,
                        'status_id' => $unread_notification_status->id,
                        'from_user_id' => $current_event->user_id,
                        'to_user_id' => $subscription->subscriber_id,
                        'event_id' => $current_event->id
                    ]);
                endforeach;

            } else {
                Notification::create([
                    'type_id' => $event_title_updated_type->id,
                    'status_id' => $unread_notification_status->id,
                    'from_user_id' => $current_event->user_id,
                    'event_id' => $current_event->id
                ]);
            }

            $notification = Notification::where([['type_id', $event_title_updated_type->id], ['from_user_id', $current_event->user_id], ['event_id', $event->id]])->first();

            History::create([
                'type_id' => $activities_history_type->id,
                'status_id' => $unread_history_status->id,
                'from_user_id' => $current_event->user_id,
                'for_notification_id' => $notification->id
            ]);
        }

        if ($inputs['event_description'] != null) {
            $event->update([
                'event_description' => $inputs['event_description'],
                'updated_at' => now()
            ]);
        }

        if ($inputs['start_at'] != null) {
            if ($current_event->start_at != $inputs['start_at']) {
                if (trim($inputs['start_at']) == null) {
                    return $this->handleError(__('miscellaneous.found_value') . ' ' . $inputs['start_at'], __('miscellaneous.public.events.data.date_start.error'), 400);
                }
            }

            $event->update([
                'start_at' => $inputs['start_at'],
                'updated_at' => now()
            ]);
        }

        if ($inputs['end_at'] != null) {
            if ($current_event->end_at != $inputs['end_at']) {
                if (trim($inputs['end_at']) == null) {
                    return $this->handleError(__('miscellaneous.found_value') . ' ' . $inputs['end_at'], __('miscellaneous.public.events.data.date_end.error'), 400);
                }
            }

            $event->update([
                'end_at' => $inputs['end_at'],
                'updated_at' => now()
            ]);
        }

        if ($inputs['timezone'] != null) {
            $request->validate([
                'timezone' => 'required|timezone'
            ]);

            $event->update([
                'timezone' => $inputs['timezone'],
                'updated_at' => now()
            ]);
        }

        if ($inputs['is_virtual'] != null) {
            $event->update([
                'is_virtual' => $inputs['is_virtual'],
                'updated_at' => now()
            ]);
        }

        if ($inputs['event_place'] != null) {
            $event->update([
                'event_place' => $inputs['event_place'],
                'updated_at' => now()
            ]);
        }

        if ($inputs['type_id'] != null) {
            $event->update([
                'type_id' => $inputs['type_id'],
                'updated_at' => now()
            ]);
        }

        if ($inputs['status_id'] != null) {
            $event->update([
                'status_id' => $inputs['status_id'],
                'updated_at' => now()
            ]);
        }

        if ($inputs['user_id'] != null) {
            $event->update([
                'user_id' => $inputs['user_id'],
                'updated_at' => now()
            ]);
        }

        if ($request->filled('fields_ids')) {
            $event->fields()->sync($request->fields_ids);
        }

        return $this->handleResponse(new ResourcesEvent($event), __('notifications.update_event_success'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function destroy(Event $event)
    {
        $event->delete();

        $events = Event::orderByDesc('created_at')->paginate(30);
        $count_events = Event::count();

        return $this->handleResponse(ResourcesEvent::collection($events), __('notifications.delete_event_success'), $events->lastPage(), $count_events);
    }

    // ==================================== CUSTOM METHODS ====================================
    /**
     * Search a event by its title.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string $data
     * @param  int $visitor_id
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request, $visitor_id)
    {
        // Group
        $history_type_group = Group::where('group_name->fr', 'Type d’historique')->first();
        $access_type_group = Group::where('group_name->fr', 'Type d’accès')->first();
        // Type
        $search_history_type = Type::where([['type_name->fr', 'Historique des recherches'], ['group_id', $history_type_group->id]])->first();
        $public_type = Type::where([['type_name->fr', 'Public'], ['group_id', $access_type_group->id]])->first();

        if ($visitor_id != 0) {
            $visitor = User::find($visitor_id);

            if (is_null($visitor)) {
                return $this->handleResponse([], __('notifications.find_visitor_404'));
            }

            if (isset($request->date_from) OR isset($request->date_to)) {
                $events = Event::whereBetween('created_at', [$request->date_from, $request->date_to])->orderByDesc('created_at')->paginate(30);
                $count_events = Event::whereBetween('created_at', [$request->date_from, $request->date_to])->count();

                if (is_null($events)) {
                    return $this->handleResponse([], __('miscellaneous.empty_list'));
                }

                return $this->handleResponse(ResourcesEvent::collection($events), __('notifications.find_all_events_success'), $events->lastPage(), $count_events);

            } else {
                $events = Event::where('event_title', 'LIKE', '%' . $request->data . '%')->orderByDesc('created_at')->paginate(30);
                $count_events = Event::where('event_title', 'LIKE', '%' . $request->data . '%')->count();

                if (is_null($events)) {
                    return $this->handleResponse([], __('miscellaneous.empty_list'));
                }

                /*
                    HISTORY AND/OR NOTIFICATION MANAGEMENT
                */
                History::create([
                    'search_content' => $request->data,
                    'type_id' => $search_history_type->id,
                    'from_user_id' => $visitor->id
                ]);

                return $this->handleResponse(ResourcesEvent::collection($events), __('notifications.find_all_events_success'), $events->lastPage(), $count_events);
            }

        } else {
            if (isset($request->date_from) OR isset($request->date_to)) {
                $events = Event::where('type_id', $public_type->id)->whereBetween('created_at', [$request->date_from, $request->date_to])->orderByDesc('created_at')->paginate(30);
                $count_events = Event::where('type_id', $public_type->id)->whereBetween('created_at', [$request->date_from, $request->date_to])->count();

                if (is_null($events)) {
                    return $this->handleResponse([], __('miscellaneous.empty_list'));
                }

                return $this->handleResponse(ResourcesEvent::collection($events), __('notifications.find_all_events_success'), $events->lastPage(), $count_events);

            } else {
                $events = Event::where(['event_title', 'LIKE', '%' . $request->data . '%'], ['type_id', $public_type->id])->orderByDesc('created_at')->paginate(30);
                $count_events = Event::where(['event_title', 'LIKE', '%' . $request->data . '%'], ['type_id', $public_type->id])->count();

                return $this->handleResponse(ResourcesEvent::collection($events), __('notifications.find_all_events_success'), $events->lastPage(), $count_events);
            }
        }
    }

    /**
     * Find all events by type.
     *
     * @param  string $locale
     * @param  string $type_name
     * @return \Illuminate\Http\Response
     */
    public function findByType($locale, $type_name)
    {
        $type = Type::where('type_name->' . $locale, $type_name)->first();

        if (is_null($type)) {
            return $this->handleError(__('notifications.find_type_404'));
        }

        $events = Event::where('type_id', $type->id)->orderByDesc('created_at')->paginate(30);
        $count_events = Event::where('type_id', $type->id)->count();

        return $this->handleResponse(ResourcesEvent::collection($events), __('notifications.find_all_events_success'), $events->lastPage(), $count_events);
    }

    /**
     * Find all events by status.
     *
     * @param  string $locale
     * @param  string $status_name
     * @return \Illuminate\Http\Response
     */
    public function findByStatus($locale, $status_name)
    {
        $status = Type::where('status_name->' . $locale, $status_name)->first();

        if (is_null($status)) {
            return $this->handleError(__('notifications.find_status_404'));
        }

        $events = Event::where('status_id', $status->id)->orderByDesc('created_at')->paginate(30);
        $count_events = Event::where('status_id', $status->id)->count();

        return $this->handleResponse(ResourcesEvent::collection($events), __('notifications.find_all_events_success'), $events->lastPage(), $count_events);
    }

    /**
     * Find all user events.
     *
     * @param  int $user_id
     * @return \Illuminate\Http\Response
     */
    public function findByUser($user_id)
    {
        $user = User::find($user_id);

        if (is_null($user)) {
            return $this->handleError(__('notifications.find_user_404'));
        }

        $events = Event::where('user_id', $user->id)->orderByDesc('created_at')->paginate(30);
        $count_events = Event::where('user_id', $user->id)->count();

        return $this->handleResponse(ResourcesEvent::collection($events), __('notifications.find_all_events_success'), $events->lastPage(), $count_events);
    }

    /**
     * Find all event speakers.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function findSpeakers($id)
    {
        $event = Event::find($id);

        if (is_null($event)) {
            return $this->handleError(__('notifications.find_event_404'));
        }

        $users = $event->users()->wherePivot('is_speaker', 1)->paginate(30);
        $count_users = $event->users()->wherePivot('is_speaker', 1)->count();

        return $this->handleResponse(ResourcesUser::collection($users), __('notifications.find_all_users_success'), $users->lastPage(), $count_users);
    }

    /**
     * Find all user events filtered.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int $user_id
     * @return \Illuminate\Http\Response
     */
    public function filterForUser(Request $request, $user_id)
    {
        $user = User::find($user_id);

        if (is_null($user)) {
            return $this->handleError(__('notifications.find_user_404'));
        }

        $query = Event::query();

        $query->where('user_id', $user->id);

        // Add dynamic conditions
        $query->when($request->type_id, function ($query) use ($request) {
            return $query->where('type_id', $request->type_id);
        });

        $query->when($request->status_id, function ($query) use ($request) {
            return $query->where('status_id', $request->status_id);
        });

        $query->when($request->fields_ids, function ($query) use ($request) {
            return $query->whereHas('fields', function ($query) use ($request) {
                                $query->whereIn('fields.id', $request->fields_ids);
                            });
        });

        // Retrieves the query results
        $events = $query->orderByDesc('created_at')->paginate(12);
        $count_events = $query->count();

        return $this->handleResponse(ResourcesEvent::collection($events), __('notifications.find_all_events_success'), $events->lastPage(), $count_events);
    }

    /**
     * Find all events filtered.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function filterForEverybody(Request $request)
    {
        $query = Event::query();

        // Add dynamic conditions
        $query->when($request->type_id, function ($query) use ($request) {
            return $query->where('type_id', $request->type_id);
        });

        $query->when($request->status_id, function ($query) use ($request) {
            return $query->where('status_id', $request->status_id);
        });

        $query->when($request->fields_ids, function ($query) use ($request) {
            return $query->whereHas('fields', function ($query) use ($request) {
                                $query->whereIn('fields.id', $request->fields_ids);
                            });
        });

        // Retrieves the query results
        $events = $query->orderByDesc('created_at')->paginate(12);
        $count_events = $query->count();

        return $this->handleResponse(ResourcesEvent::collection($events), __('notifications.find_all_events_success'), $events->lastPage(), $count_events);
    }

    /**
     * Add fields to event.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function addFields(Request $request, $id)
    {
        $event = Event::find($id);

        if (is_null($event)) {
            return $this->handleError(__('notifications.find_event_404'));
        }

        if (isset($request->field_id)) {
            $event->fields()->syncWithoutDetaching([$request->field_id]);
        }

        if (isset($request->fields_ids)) {
            $event->fields()->syncWithoutDetaching($request->fields_ids);
        }

        return $this->handleResponse(new ResourcesEvent($event), __('notifications.update_event_success'));
    }

    /**
     * Withdraw fields from event.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function withdrawFields(Request $request, $id)
    {
        $event = Event::find($id);

        if (is_null($event)) {
            return $this->handleError(__('notifications.find_event_404'));
        }

        if (isset($request->field_id)) {
            $event->fields()->detach([$request->field_id]);
        }

        if (isset($request->fields_ids)) {
            $event->fields()->detach($request->fields_ids);
        }

        return $this->handleResponse(new ResourcesEvent($event), __('notifications.update_event_success'));
    }

    /**
     * Update cover picture in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function updateCover(Request $request, $id)
    {
        $inputs = [
            'event_id' => $request->event_id,
            'image_64' => $request->image_64,
            'x' => $request->x,
            'y' => $request->y,
            'width' => $request->width,
            'height' => $request->height
        ];
        // $extension = explode('/', explode(':', substr($inputs['image_64'], 0, strpos($inputs['image_64'], ';')))[1])[1];
        $replace = substr($inputs['image_64'], 0, strpos($inputs['image_64'], ',') + 1);
        // Find substring from replace here eg: data:image/png;base64,
        $image = str_replace($replace, '', $inputs['image_64']);
        $image = str_replace(' ', '+', $image);
        // Create image URL
		$image_url = 'images/events/' . $inputs['event_id'] . '/cover/' . Str::random(50) . '.png';

		// Upload image
		Storage::url(Storage::disk('public')->put($image_url, base64_decode($image)));

		$event = Event::find($id);

        $event->update([
            'cover_photo_path' => $image_url,
            'cover_coordinates' => $inputs['x'] . '-' . $inputs['y'] . '-' . $inputs['width'] . '-' . $inputs['height'],
            'updated_at' => now()
        ]);

        return $this->handleResponse(new ResourcesEvent($event), __('notifications.update_event_success'));
    }

    /**
     * Upload event files in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int $id
     * @param  string $locale
     * @return \Illuminate\Http\Response
     */
    public function uploadFile(Request $request, $id)
    {
        if (!isset($request->file_type_id)) {
            return $this->handleError(__('miscellaneous.found_value') . ' ' . $request->file_type_id, __('validation.custom.type.required'), 400);
        }

        // Group
        $file_type_group = Group::where('group_name->fr', 'Type de fichier')->first();
        // File type
        $type = Type::where([['id', $request->file_type_id], ['group_id', $file_type_group->id]])->first();
        // Current event
        $event = Event::find($id);

        if (is_null($type)) {
            return $this->handleError(__('notifications.find_type_404'));
        }

        if (is_null($event)) {
            return $this->handleError(__('notifications.find_event_404'));
        }

        if ($request->hasFile('file_url')) {
            if ($type->getTranslation('type_name', 'fr') == 'Document') {
                $file_url = 'documents/events/' . $event->id . '/' . Str::random(50) . '.' . $request->file('file_url')->extension();
                // Upload file
                $dir_result = Storage::url(Storage::disk('public')->put($file_url, $request->file('file_url')));

                File::create([
                    'file_name' => trim($request->file_name) != null ? $request->file_name : null,
                    'file_url' => $dir_result,
                    'type_id' => $type->id,
                    'event_id' => $event->id
                ]);

                return $this->handleResponse(new ResourcesEvent($event), __('notifications.update_event_success'));
            }

            if ($type->getTranslation('type_name', 'fr') == 'Image') {
                $file_url = 'images/events/' . $event->id . '/' . Str::random(50) . '.' . $request->file('file_url')->extension();
                // Upload file
                $dir_result = Storage::url(Storage::disk('public')->put($file_url, $request->file('file_url')));

                File::create([
                    'file_name' => trim($request->file_name) != null ? $request->file_name : null,
                    'file_url' => $dir_result,
                    'type_id' => $type->id,
                    'event_id' => $event->id
                ]);

                return $this->handleResponse(new ResourcesEvent($event), __('notifications.update_event_success'));
            }

            if ($type->getTranslation('type_name', 'fr') == 'Audio') {
                $file_url = 'audios/events/' . $event->id . '/' . Str::random(50) . '.' . $request->file('file_url')->extension();
                // Upload file
                $dir_result = Storage::url(Storage::disk('public')->put($file_url, $request->file('file_url')));

                File::create([
                    'file_name' => trim($request->file_name) != null ? $request->file_name : null,
                    'file_url' => $dir_result,
                    'type_id' => $type->id,
                    'event_id' => $event->id
                ]);

                return $this->handleResponse(new ResourcesEvent($event), __('notifications.update_event_success'));
            }
        }
    }
}
