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
class Event extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $last_field = Field::collection($this->fields)->sortByDesc('created_at')->first();

        if (Auth::check()) {
            $user = Auth::user();

            return [
                'id' => $this->id,
                'event_title' => $this->event_title,
                'event_description' => $this->event_description,
                'start_at' => $this->start_at,
                'end_at' => $this->end_at,
                'start_at_with_auth_timezone' => !empty($this->start_at) ? Carbon::createFromFormat('Y-m-d H:i:s', $this->start_at, $this->timezone)->setTimezone($user->timezone) : null,
                'end_at_with_auth_timezone' => !empty($this->end_at) ? Carbon::createFromFormat('Y-m-d H:i:s', $this->end_at, $this->timezone)->setTimezone($user->timezone) : null,
                'start_at_explicit' => !empty($this->start_at) ? ($this->start_at->format('Y') == date('Y') ? explicitDayMonth($this->start_at->format('Y-m-d H:i:s')) : explicitDate($this->start_at->format('Y-m-d H:i:s'))) : null,
                'end_at_explicit' => !empty($this->end_at) ? ($this->end_at->format('Y') == date('Y') ? explicitDayMonth($this->end_at->format('Y-m-d H:i:s')) : explicitDate($this->end_at->format('Y-m-d H:i:s'))) : null,
                'timezone' => $this->timezone,
                'is_virtual' => $this->is_virtual,
                'event_place' => $this->event_place,
                'cover_photo_path' => !empty($this->cover_photo_path) ? getWebURL() . '/storage/' . $this->cover_photo_path : getWebURL() . '/assets/img/cover-' . $last_field->alias . '.svg',
                'cover_coordinates' => $this->cover_coordinates,
                'type' => Type::make($this->type),
                'status' => Status::make($this->status),
                'owner' => User::make($this->user),
                'participants' => User::collection($this->users),
                'files' => File::collection($this->files),
                'posts' => Post::collection($this->posts),
                'fields' => Field::collection($this->fields),
                'created_at' => $this->created_at->format('Y-m-d H:i:s'),
                'updated_at' => $this->updated_at->format('Y-m-d H:i:s'),
                'created_at_explicit' => $this->created_at->format('Y') == date('Y') ? explicitDayMonth($this->created_at->format('Y-m-d H:i:s')) : explicitDate($this->created_at->format('Y-m-d H:i:s')),
                'updated_at_explicit' => $this->updated_at->format('Y') == date('Y') ? explicitDayMonth($this->updated_at->format('Y-m-d H:i:s')) : explicitDate($this->updated_at->format('Y-m-d H:i:s')),
                'created_at_ago' => timeAgo($this->created_at->format('Y-m-d H:i:s')),
                'updated_at_ago' => timeAgo($this->updated_at->format('Y-m-d H:i:s'))
            ];

        } else {
            return [
                'id' => $this->id,
                'event_title' => $this->event_title,
                'event_description' => $this->event_description,
                'start_at' => $this->start_at,
                'end_at' => $this->end_at,
                'start_at_explicit' => !empty($this->start_at) ? ($this->start_at->format('Y') == date('Y') ? explicitDayMonth($this->start_at->format('Y-m-d H:i:s')) : explicitDate($this->start_at->format('Y-m-d H:i:s'))) : null,
                'end_at_explicit' => !empty($this->end_at) ? ($this->end_at->format('Y') == date('Y') ? explicitDayMonth($this->end_at->format('Y-m-d H:i:s')) : explicitDate($this->end_at->format('Y-m-d H:i:s'))) : null,
                'timezone' => $this->timezone,
                'is_virtual' => $this->is_virtual,
                'event_place' => $this->event_place,
                'cover_photo_path' => !empty($this->cover_photo_path) ? getWebURL() . '/storage/' . $this->cover_photo_path : getWebURL() . '/assets/img/cover-' . $last_field->alias . '.svg',
                'cover_coordinates' => $this->cover_coordinates,
                'type' => Type::make($this->type),
                'status' => Status::make($this->status),
                'owner' => User::make($this->user),
                'participants' => User::collection($this->users),
                'files' => File::collection($this->files),
                'posts' => Post::collection($this->posts),
                'fields' => Field::collection($this->fields),
                'created_at' => $this->created_at->format('Y-m-d H:i:s'),
                'updated_at' => $this->updated_at->format('Y-m-d H:i:s'),
                'created_at_explicit' => $this->created_at->format('Y') == date('Y') ? explicitDayMonth($this->created_at->format('Y-m-d H:i:s')) : explicitDate($this->created_at->format('Y-m-d H:i:s')),
                'updated_at_explicit' => $this->updated_at->format('Y') == date('Y') ? explicitDayMonth($this->updated_at->format('Y-m-d H:i:s')) : explicitDate($this->updated_at->format('Y-m-d H:i:s')),
                'created_at_ago' => timeAgo($this->created_at->format('Y-m-d H:i:s')),
                'updated_at_ago' => timeAgo($this->updated_at->format('Y-m-d H:i:s'))
            ];
        }
    }
}
