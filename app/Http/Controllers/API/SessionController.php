<?php

namespace App\Http\Controllers\API;

use App\Models\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use App\Http\Resources\Session as ResourcesSession;

/**
 * @author Xanders
 * @see https://team.xsamtech.com/xanderssamoth
 */
class SessionController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sessions = Session::orderByDesc('created_at')->get();

        return $this->handleResponse(ResourcesSession::collection($sessions), __('notifications.find_all_sessions_success'));
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
            'id' => empty($request->id) ? Str::random(255) : $request->id,
            'ip_address' => $request->ip_address,
            'user_agent' => $request->user_agent,
            'payload' => $request->payload,
            'last_activity' => $request->last_activity,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
            'city' => $request->city,
            'region' => $request->region,
            'country' => $request->country,
            'user_id' => $request->user_id
        ];

        $validator = Validator::make($inputs, [
            'ip_address' => ['required']
        ]);

        if ($validator->fails()) {
            return $this->handleError($validator->errors());       
        }

        $session = Session::create($inputs);

        return $this->handleResponse(new ResourcesSession($session), __('notifications.create_session_success'));
    }

    /**
     * Display the specified resource.
     *
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $session = Session::find($id);

        if (is_null($session)) {
            return $this->handleError(__('notifications.find_session_404'));
        }

        return $this->handleResponse(new ResourcesSession($session), __('notifications.find_session_success'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Session  $session
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Session $session)
    {
        // Get inputs
        $inputs = [
            'ip_address' => $request->ip_address,
            'user_agent' => $request->user_agent,
            'payload' => $request->payload,
            'last_activity' => $request->last_activity,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
            'city' => $request->city,
            'region' => $request->region,
            'country' => $request->country,
            'user_id' => $request->user_id
        ];

        if ($inputs['ip_address'] != null) {
            $session->update([
                'ip_address' => $request->ip_address
            ]);
        }

        if ($inputs['user_agent'] != null) {
            $session->update([
                'user_agent' => $request->user_agent
            ]);
        }

        if ($inputs['payload'] != null) {
            $session->update([
                'payload' => $request->payload
            ]);
        }

        if ($inputs['last_activity'] != null) {
            $session->update([
                'last_activity' => $request->last_activity
            ]);
        }

        if ($inputs['latitude'] != null) {
            $session->update([
                'latitude' => $inputs['latitude'],
                'updated_at' => now(),
            ]);
        }

        if ($inputs['longitude'] != null) {
            $session->update([
                'longitude' => $inputs['longitude'],
                'updated_at' => now(),
            ]);
        }

        if ($inputs['city'] != null) {
            $session->update([
                'city' => $inputs['city'],
                'updated_at' => now(),
            ]);
        }

        if ($inputs['region'] != null) {
            $session->update([
                'region' => $inputs['region'],
                'updated_at' => now(),
            ]);
        }

        if ($inputs['country'] != null) {
            $session->update([
                'country' => $inputs['country'],
                'updated_at' => now(),
            ]);
        }

        if ($inputs['user_id'] != null) {
            $session->update([
                'user_id' => $request->user_id
            ]);
        }

        $session->update($inputs);

        return $this->handleResponse(new ResourcesSession($session), __('notifications.update_session_success'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Session  $session
     * @return \Illuminate\Http\Response
     */
    public function destroy(Session $session)
    {
        $session->delete();

        $sessions = Session::all();

        return $this->handleResponse(ResourcesSession::collection($sessions), __('notifications.delete_session_success'));
    }
}
