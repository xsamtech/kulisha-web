<?php

namespace App\Http\Controllers\API;

use App\Models\History;
use App\Models\Status;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\History as ResourcesHistory;
use App\Models\Type;

/**
 * @author Xanders
 * @see https://team.xsamtech.com/xanderssamoth
 */
class HistoryController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $histories = History::orderByDesc('created_at')->get();

        return $this->handleResponse(ResourcesHistory::collection($histories), __('notifications.find_all_histories_success'));
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
            'search_content' => $request->search_content,
            'type_id' => $request->type_id,
            'status_id' => $request->status_id,
            'from_user_id' => $request->from_user_id,
            'to_user_id' => $request->to_user_id,
            'post_id' => $request->post_id,
            'event_id' => $request->event_id,
            'community_id' => $request->community_id,
            'message_id' => $request->message_id,
            'team_id' => $request->team_id,
            'reaction_id' => $request->reaction_id,
            'cart_id' => $request->cart_id,
            'session_id' => $request->session_id,
            'subscription_id' => $request->subscription_id,
            'for_notification_id' => $request->for_notification_id,
        ];

        $validator = Validator::make($inputs, [
            'type_id' => ['required']
        ]);

        if ($validator->fails()) {
            return $this->handleError($validator->errors());       
        }

        $history = History::create($inputs);

        return $this->handleResponse(new ResourcesHistory($history), __('notifications.create_history_success'));
    }

    /**
     * Display the specified resource.
     *
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $history = History::find($id);

        if (is_null($history)) {
            return $this->handleError(__('notifications.find_history_404'));
        }

        return $this->handleResponse(new ResourcesHistory($history), __('notifications.find_history_success'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\History  $history
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, History $history)
    {
        // Get inputs
        $inputs = [
            'search_content' => $request->search_content,
            'type_id' => $request->type_id,
            'status_id' => $request->status_id,
            'from_user_id' => $request->from_user_id,
            'to_user_id' => $request->to_user_id,
            'post_id' => $request->post_id,
            'event_id' => $request->event_id,
            'community_id' => $request->community_id,
            'message_id' => $request->message_id,
            'team_id' => $request->team_id,
            'reaction_id' => $request->reaction_id,
            'cart_id' => $request->cart_id,
            'session_id' => $request->session_id,
            'subscription_id' => $request->subscription_id,
            'for_notification_id' => $request->for_notification_id,
        ];

        $validator = Validator::make($inputs, [
            'type_id' => ['required']
        ]);

        if ($validator->fails()) {
            return $this->handleError($validator->errors());       
        }

        $history->update($inputs);

        return $this->handleResponse(new ResourcesHistory($history), __('notifications.update_history_success'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\History  $history
     * @return \Illuminate\Http\Response
     */
    public function destroy(History $history)
    {
        $history->delete();

        $histories = History::all();

        return $this->handleResponse(ResourcesHistory::collection($histories), __('notifications.delete_history_success'));
    }

    // ==================================== CUSTOM METHODS ====================================
    /**
     * Select all user histories.
     *
     * @param  int $user_id
     * @param  string $type_alias
     * @param  string $status_alias
     * @param  int $addressee_id
     * @return \Illuminate\Http\Response
     */
    public function selectByUser($user_id, $type_alias, $status_alias, $addressee_id)
    {
        $user = User::find($user_id);

        if (is_null($user)) {
            return $this->handleError(__('notifications.find_user_404'));
        }

        $type = Type::where('alias', $type_alias)->first();

        if (is_null($type)) {
            return $this->handleError(__('notifications.find_type_404'));
        }

        if ($status_alias != '0') {
            $status = Status::where('alias', $status_alias)->first();

            if (is_null($status)) {
                return $this->handleError(__('notifications.find_status_404'));
            }

            if ($addressee_id != 0) {
                $addressee = User::find($addressee_id);

                if (is_null($addressee)) {
                    return $this->handleError(__('notifications.find_addressee_404'));
                }

                $histories = History::where([['type_id', $type->id], ['status_id', $status->id], ['from_user_id', $user->id], ['to_user_id', $addressee->id]])->orderByDesc('created_at')->get();

                return $this->handleResponse(ResourcesHistory::collection($histories), __('notifications.find_all_histories_success'));

            } else {
                $histories = History::where([['type_id', $type->id], ['status_id', $status->id], ['from_user_id', $user->id]])->orderByDesc('created_at')->get();

                return $this->handleResponse(ResourcesHistory::collection($histories), __('notifications.find_all_histories_success'));
            }

        } else {
            if ($addressee_id != 0) {
                $addressee = User::find($addressee_id);

                if (is_null($addressee)) {
                    return $this->handleError(__('notifications.find_addressee_404'));
                }

                $histories = History::where([['type_id', $type->id], ['from_user_id', $user->id], ['to_user_id', $addressee->id]])->orderByDesc('created_at')->get();

                return $this->handleResponse(ResourcesHistory::collection($histories), __('notifications.find_all_histories_success'));

            } else {
                $histories = History::where([['type_id', $type->id], ['from_user_id', $user->id]])->orderByDesc('created_at')->get();

                return $this->handleResponse(ResourcesHistory::collection($histories), __('notifications.find_all_histories_success'));
            }
        }
    }

    /**
     * Change history status.
     *
     * @param  int $id
     * @param  string $status_alias
     * @return \Illuminate\Http\Response
     */
    public function switchStatus($id, $status_alias)
    {
        $history = History::find($id);

        if (is_null($history)) {
            return $this->handleError(__('notifications.find_history_404'));
        }

        $status = Status::where('alias', $status_alias)->first();

        if (is_null($status)) {
            return $this->handleError(__('notifications.find_status_404'));
        }

        // update "status_id" column
        $history->update([
            'status_id' => $status->id,
            'updated_at' => now()
        ]);

        return $this->handleResponse(new ResourcesHistory($history), __('notifications.update_history_success'));
    }

    /**
     * Mark all histories status as read.
     *
     * @param  int $user_id
     * @return \Illuminate\Http\Response
     */
    public function markAllRead($user_id)
    {
        $status_read = Status::where('alias', 'history_read')->first();
        $user = User::find($user_id);

        if (is_null($user)) {
            return $this->handleError(__('notifications.find_user_404'));
        }

        $histories = History::where('to_user_id', $user->id)->get();

        // update "status_id" column for all user histories
        foreach ($histories as $history):
            $history->update([
                'status_id' => $status_read->id,
                'updated_at' => now()
            ]);
        endforeach;

        return $this->handleResponse(ResourcesHistory::collection($histories), __('notifications.find_all_histories_success'));
    }
}
