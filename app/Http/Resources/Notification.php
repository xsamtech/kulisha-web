<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Auth;

/**
 * @author Xanders
 * @see https://team.xsamtech.com/xanderssamoth
 */
class Notification extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        if (Auth::check()) {
            $user = Auth::user();

            return [
                'id' => $this->id,
                'days_before_blocking' => $this->days_before_blocking,
                'type' => Type::make($this->type),
                'status' => Status::make($this->status),
                'from' => User::make($this->from_user),
                'post' => Post::make($this->post),
                'event' => Event::make($this->event),
                'community' => Community::make($this->community),
                'message' => Message::make($this->message),
                'team' => Team::make($this->team),
                'reaction' => Reaction::make($this->reaction),
                'cart' => Cart::make($this->cart),
                'created_at' => $this->created_at->format('Y-m-d H:i:s'),
                'updated_at' => $this->updated_at->format('Y-m-d H:i:s'),
                'created_at_with_auth_timezone' => !empty($this->created_at) ? Carbon::createFromFormat('Y-m-d H:i:s', $this->created_at, 'UTC')->setTimezone($user->timezone) : null,
                'updated_at_with_auth_timezone' => !empty($this->updated_at) ? Carbon::createFromFormat('Y-m-d H:i:s', $this->updated_at, 'UTC')->setTimezone($user->timezone) : null,
                'created_at_explicit' => $this->created_at->format('Y') == date('Y') ? explicitDayMonth($this->created_at->format('Y-m-d H:i:s')) : explicitDate($this->created_at->format('Y-m-d H:i:s')),
                'updated_at_explicit' => $this->updated_at->format('Y') == date('Y') ? explicitDayMonth($this->updated_at->format('Y-m-d H:i:s')) : explicitDate($this->updated_at->format('Y-m-d H:i:s')),
                'created_at_ago' => timeAgo($this->created_at->format('Y-m-d H:i:s')),
                'updated_at_ago' => timeAgo($this->updated_at->format('Y-m-d H:i:s')),
                'to_user_id' => $this->to_user_id
            ];

        } else {
            return [
                'id' => $this->id,
                'days_before_blocking' => $this->days_before_blocking,
                'type' => Type::make($this->type),
                'status' => Status::make($this->status),
                'from' => User::make($this->from_user),
                'post' => Post::make($this->post),
                'event' => Event::make($this->event),
                'community' => Community::make($this->community),
                'message' => Message::make($this->message),
                'team' => Team::make($this->team),
                'reaction' => Reaction::make($this->reaction),
                'cart' => Cart::make($this->cart),
                'created_at' => $this->created_at->format('Y-m-d H:i:s'),
                'updated_at' => $this->updated_at->format('Y-m-d H:i:s'),
                'created_at_explicit' => $this->created_at->format('Y') == date('Y') ? explicitDayMonth($this->created_at->format('Y-m-d H:i:s')) : explicitDate($this->created_at->format('Y-m-d H:i:s')),
                'updated_at_explicit' => $this->updated_at->format('Y') == date('Y') ? explicitDayMonth($this->updated_at->format('Y-m-d H:i:s')) : explicitDate($this->updated_at->format('Y-m-d H:i:s')),
                'created_at_ago' => timeAgo($this->created_at->format('Y-m-d H:i:s')),
                'updated_at_ago' => timeAgo($this->updated_at->format('Y-m-d H:i:s')),
                'to_user_id' => $this->to_user_id
            ];
        }
    }
}
