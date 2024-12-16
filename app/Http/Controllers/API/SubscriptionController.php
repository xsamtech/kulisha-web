<?php

namespace App\Http\Controllers\API;

use App\Models\Group;
use App\Models\Status;
use App\Models\Subscription;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Resources\Subscription as ResourcesSubscription;
use App\Http\Resources\User as ResourcesUser;

/**
 * @author Xanders
 * @see https://team.xsamtech.com/xanderssamoth
 */
class SubscriptionController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subscriptions = Subscription::orderByDesc('created_at')->get();

        return $this->handleResponse(ResourcesSubscription::collection($subscriptions), __('notifications.find_all_subscriptions_success'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Get inputs
        $inputs = [
            'email' => $request->email,
            'phone' => $request->phone,
            'user_id' => $request->user_id,
            'subscriber_id' => $request->subscriber_id,
            'status_id' => $request->status_id
        ];

        $subscription = Subscription::create($inputs);

        return $this->handleResponse(new ResourcesSubscription($subscription), __('notifications.create_subscription_success'));
    }

    /**
     * Display the specified resource.
     *
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $subscription = Subscription::find($id);

        if (is_null($subscription)) {
            return $this->handleError(__('notifications.find_subscription_404'));
        }

        return $this->handleResponse(new ResourcesSubscription($subscription), __('notifications.find_subscription_success'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Subscription  $subscription
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Subscription $subscription)
    {
        // Get inputs
        $inputs = [
            'notify_post' => $request->notify_post,
            'notify_message' => $request->notify_message,
            'is_following' => $request->is_following,
            'email' => $request->email,
            'phone' => $request->phone,
            'user_id' => $request->user_id,
            'subscriber_id' => $request->subscriber_id,
            'status_id' => $request->status_id
        ];

        if ($inputs['notify_post'] != null) {
            $subscription->update([
                'notify_post' => $inputs['notify_post'],
                'updated_at' => now(),
            ]);
        }

        if ($inputs['notify_message'] != null) {
            $subscription->update([
                'notify_message' => $inputs['notify_message'],
                'updated_at' => now(),
            ]);
        }

        if ($inputs['is_following'] != null) {
            $subscription->update([
                'is_following' => $inputs['is_following'],
                'updated_at' => now(),
            ]);
        }

        if ($inputs['email'] != null) {
            $subscription->update([
                'email' => $inputs['email'],
                'updated_at' => now(),
            ]);
        }

        if ($inputs['phone'] != null) {
            $subscription->update([
                'phone' => $inputs['phone'],
                'updated_at' => now(),
            ]);
        }

        if ($inputs['user_id'] != null) {
            $subscription->update([
                'user_id' => $inputs['user_id'],
                'updated_at' => now(),
            ]);
        }

        if ($inputs['subscriber_id'] != null) {
            $subscription->update([
                'subscriber_id' => $inputs['subscriber_id'],
                'updated_at' => now(),
            ]);
        }

        if ($inputs['status_id'] != null) {
            $subscription->update([
                'status_id' => $inputs['status_id'],
                'updated_at' => now(),
            ]);
        }

        return $this->handleResponse(new ResourcesSubscription($subscription), __('notifications.update_subscription_success'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Subscription  $subscription
     * @return \Illuminate\Http\Response
     */
    public function destroy(Subscription $subscription)
    {
        $subscription->delete();

        $subscriptions = Subscription::all();

        return $this->handleResponse(ResourcesSubscription::collection($subscriptions), __('notifications.delete_subscription_success'));
    }

    // ==================================== CUSTOM METHODS ====================================
    /**
     * Check if user is follower/following
     *
     * @param  int $user_id
     * @param  int $addressee_id
     * @param  string $as_what
     * @return \Illuminate\Http\Response
     */
    public function isConnectedAs($user_id, $addressee_id, $as_what)
    {
        // Group
        $susbcription_status_group = Group::where('group_name->fr', 'Etat de la souscription')->first();
        // Status
        $accepted_status = Status::where([['status_name->fr', 'Acceptée'], ['group_id', $susbcription_status_group->id]])->first();
        // Users
        $user = User::find($user_id);
        $addressee = User::find($addressee_id);

        if (is_null($user)) {
            return $this->handleError(__('notifications.find_user_404'));
        }

        if (is_null($addressee)) {
            return $this->handleError(__('notifications.find_addressee_404'));
        }

        if ($as_what == 'follower') {
            $connection = Subscription::where([['user_id', $addressee->id], ['subscriber_id', $user->id], ['status_id', $accepted_status->id]])->first();

            if (is_null($connection)) {
                return $this->handleResponse(0, __('notifications.find_subscription_404'));

            } else {
                return $this->handleResponse(1, __('notifications.find_subscription_success'));
            }
        }

        if ($as_what == 'followed') {
            $connection = Subscription::where([['user_id', $user->id], ['subscriber_id', $addressee->id], ['status_id', $accepted_status->id]])->first();

            if (is_null($connection)) {
                return $this->handleResponse(0, __('notifications.find_subscription_404'));

            } else {
                return $this->handleResponse(1, __('notifications.find_subscription_success'));
            }
        }
    }

    /**
     * User subscriptions in waiting
     *
     * @param  int $user_id
     * @param  string $as_what
     * @return \Illuminate\Http\Response
     */
    public function waitingSubscription($user_id, $as_what)
    {
        // Group
        $susbcription_status_group = Group::where('group_name->fr', 'Etat de la souscription')->first();
        // Status
        $waiting_status = Status::where([['status_name->fr', 'En attente'], ['group_id', $susbcription_status_group->id]])->first();
        // Request
        $user = User::find($user_id);

        if (is_null($user)) {
            return $this->handleError(__('notifications.find_user_404'));
        }

        if ($as_what == 'follower') {
            $subscriptions = Subscription::where([['subscriber_id', $user->id], ['status_id', $waiting_status->id]])->orderByDesc('created_at')->paginate(10);
            $count_all = Subscription::where([['subscriber_id', $user->id], ['status_id', $waiting_status->id]])->count();

            return $this->handleResponse(ResourcesSubscription::collection($subscriptions), __('notifications.find_all_subscriptions_success'), $subscriptions->lastPage(), $count_all);
        }

        if ($as_what == 'followed') {
            $subscriptions = Subscription::where([['user_id', $user->id], ['status_id', $waiting_status->id]])->orderByDesc('created_at')->paginate(10);
            $count_all = Subscription::where([['user_id', $user->id], ['status_id', $waiting_status->id]])->count();

            return $this->handleResponse(ResourcesSubscription::collection($subscriptions), __('notifications.find_all_subscriptions_success'), $subscriptions->lastPage(), $count_all);
        }
    }

    /**
     * User subscribers
     *
     * @param  int $user_id
     * @return \Illuminate\Http\Response
     */
    public function userSubscribers($user_id)
    {
        // Group
        $susbcription_status_group = Group::where('group_name->fr', 'Etat de la souscription')->first();
        // Status
        $accepted_status = Status::where([['status_name->fr', 'Acceptée'], ['group_id', $susbcription_status_group->id]])->first();
        // Request
        $user = User::find($user_id);

        if (is_null($user)) {
            return $this->handleError(__('notifications.find_user_404'));
        }

        $subscriptions = Subscription::where([['user_id', $user->id], ['status_id', $accepted_status->id]])->orderByDesc('created_at')->paginate(10);
        $count_all = Subscription::where([['user_id', $user->id], ['status_id', $accepted_status->id]])->count();

        return $this->handleResponse(ResourcesSubscription::collection($subscriptions), __('notifications.find_all_subscriptions_success'), $subscriptions->lastPage(), $count_all);
    }

    /**
     * User subscriptions
     *
     * @param  int $user_id
     * @return \Illuminate\Http\Response
     */
    public function userSubscriptions($user_id)
    {
        // Group
        $susbcription_status_group = Group::where('group_name->fr', 'Etat de la souscription')->first();
        // Status
        $accepted_status = Status::where([['status_name->fr', 'Acceptée'], ['group_id', $susbcription_status_group->id]])->first();
        // Request
        $user = User::find($user_id);

        if (is_null($user)) {
            return $this->handleError(__('notifications.find_user_404'));
        }

        $subscriptions = Subscription::where([['subscriber_id', $user->id], ['status_id', $accepted_status->id]])->orderByDesc('created_at')->paginate(10);
        $count_all = Subscription::where([['subscriber_id', $user->id], ['status_id', $accepted_status->id]])->count();

        return $this->handleResponse(ResourcesSubscription::collection($subscriptions), __('notifications.find_all_subscriptions_success'), $subscriptions->lastPage(), $count_all);
    }

    /**
     * User connections
     *
     * @param  int $user_id
     * @return \Illuminate\Http\Response
     */
    public function userConnections($user_id)
    {
        // Group
        $susbcription_status_group = Group::where('group_name->fr', 'Etat de la souscription')->first();
        // Status
        $accepted_status = Status::where([['status_name->fr', 'Acceptée'], ['group_id', $susbcription_status_group->id]])->first();
        // Request
        $user = User::find($user_id);

        if (is_null($user)) {
            return $this->handleError(__('notifications.find_user_404'));
        }

        $subscriptions = Subscription::where([['subscriber_id', $user->id], ['status_id', $accepted_status->id]])->orWhere([['user_id', $user->id], ['status_id', $accepted_status->id]])->orderByDesc('created_at')->get();
        $user_ids = $subscriptions->pluck('user_id');
        $subscriber_ids = $subscriptions->pluck('subscriber_id');
        // Merge user connections IDs eliminating duplicates
        $unique_ids = $user_ids->merge($subscriber_ids)->unique();

        // Retrieve all connections of the user except the user himself
        $connections = User::whereIn('id', $unique_ids)->where('id', '<>', $user->id)->paginate(10);
        $count_all = User::whereIn('id', $unique_ids)->where('id', '<>', $user->id)->count();

        return $this->handleResponse(ResourcesUser::collection($connections), __('notifications.find_all_connections_success'), $connections->lastPage(), $count_all);
    }

    /**
     * Change invited contact to a member
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int $visitor_id
     * @return \Illuminate\Http\Response
     */
    public function changeContactToMember(Request $request, $visitor_id)
    {
        // Visitor
        $visitor = User::find($visitor_id);

        if (is_null($visitor)) {
            return $this->handleError(__('notifications.find_visitor_404'));
        }

        if (isset($request->phone)) {
            $user = User::where('phone', $request->phone)->first();

            if (is_null($user)) {
                return $this->handleError(__('notifications.find_user_404'));
            }

            $subscription = Subscription::where([['phone', $user->phone], ['subscriber_id', $visitor->id]])->first();

            $subscription->update([
                'user_id' => $user->id,
                'updated_at' => now()
            ]);
        }

        if (isset($request->email)) {
            $user = User::where('email', $request->email)->first();

            if (is_null($user)) {
                return $this->handleError(__('notifications.find_user_404'));
            }

            $subscription = Subscription::where([['email', $user->email], ['subscriber_id', $visitor->id]])->first();

            $subscription->update([
                'user_id' => $user->id,
                'updated_at' => now()
            ]);
        }

        return $this->handleResponse(new ResourcesSubscription($subscription), __('notifications.create_subscription_success'));
    }
}
