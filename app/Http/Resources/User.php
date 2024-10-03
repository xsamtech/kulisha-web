<?php

namespace App\Http\Resources;

use App\Models\Group as ModelsGroup;
use App\Models\Post as ModelsPost;
use App\Models\Status as ModelsStatus;
use App\Models\Subscription as ModelsSubscription;
use App\Models\Type as ModelsType;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @author Xanders
 * @see https://team.xsamtech.com/xanderssamoth
 */
class User extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        // Groups
        $post_type_group = ModelsGroup::where('group_name->fr', 'Type de post')->first();
        $post_or_community_status_group = ModelsGroup::where('group_name->fr', 'Etat du post ou de la communauté')->first();
        // Statuses
        $operational_status = ModelsStatus::where([['status_name->fr', 'Opérationnel'], ['group_id', $post_or_community_status_group->id]])->first();
        $boosted_status = ModelsStatus::where([['status_name->fr', 'Boosté'], ['group_id', $post_or_community_status_group->id]])->first();
        // Types
        $comment_type = ModelsType::where([['type_name->fr', 'Commentaire'], ['group_id', $post_type_group->id]])->first();
        $story_type = ModelsType::where([['type_name->fr', 'Story'], ['group_id', $post_type_group->id]])->first();
        // Requests
        $followers = ModelsSubscription::whereNotNull('subscriber_id')->where([['user_id', $this->id], ['is_following', 1]])->get();
        $following = ModelsSubscription::where([['subscriber_id', $this->id], ['is_following', 1]])->get();
        $regular_posts = ModelsPost::where([['user_id', $this->id], ['type_id', '<>', $comment_type->id], ['type_id', '<>', $story_type->id]])->where(function ($query) use ($operational_status, $boosted_status) {
            $query->where('status_id', $operational_status->id)->orWhere('status_id', $boosted_status->id);
        })->get();
        $last_field = Field::collection($this->fields)->sortByDesc('created_at')->first();

        return [
            'id' => $this->id,
            'firstname' => $this->firstname,
            'lastname' => $this->lastname,
            'surname' => $this->surname,
            'username' => $this->username,
            'about_me' => $this->about_me,
            'gender' => $this->gender,
            'birth_date' => !empty($this->birth_date) ? (str_starts_with(app()->getLocale(), 'fr') ? Carbon::createFromFormat('Y-m-d', $this->birth_date)->format('d/m/Y') : \Carbon\Carbon::createFromFormat('Y-m-d', $this->birth_date)->format('m/d/Y')) : null,
            'age' => !empty($this->birth_date) ? $this->age() : null,
            'country' => $this->country,
            'city' => $this->city,
            'address_1' => $this->address_1,
            'address_2' => $this->address_2,
            'p_o_box' => $this->p_o_box,
            'email' => $this->email,
            'phone' => $this->phone,
            'password' => $this->password,
            'remember_token' => $this->remember_token,
            'current_team_id' => $this->current_team_id,
            'email_verified_at' => $this->email_verified_at,
            'phone_verified_at' => $this->phone_verified_at,
            'prefered_theme' => $this->prefered_theme,
            'prefered_language' => $this->prefered_language,
            'profile_photo_path' => !empty($this->profile_photo_path) ? getWebURL() . '/storage/' . $this->profile_photo_path : getWebURL() . '/assets/img/avatar-' . $this->gender . '.svg',
            'cover_photo_path' => !empty($this->cover_photo_path) ? getWebURL() . '/storage/' . $this->cover_photo_path : getWebURL() . '/assets/img/cover-' . $last_field->alias . '.svg',
            'cover_coordinates' => $this->cover_coordinates,
            'two_factor_secret' => $this->two_factor_secret,
            'two_factor_recovery_codes' => $this->two_factor_recovery_codes,
            'two_factor_confirmed_at' => $this->two_factor_confirmed_at,
            'notify_connection_invites' => $this->notify_connection_invites,
            'notify_new_posts' => $this->notify_new_posts,
            'notify_post_answers' => $this->notify_post_answers,
            'notify_reactions' => $this->notify_reactions,
            'notify_post_shared' => $this->notify_post_shared,
            'notify_post_on_message' => $this->notify_post_on_message,
            'email_frequency' => $this->email_frequency,
            'allow_search_engine' => $this->allow_search_engine,
            'allow_search_by_email' => $this->allow_search_by_email,
            'allow_sponsored_messages' => $this->allow_sponsored_messages,
            'tips_at_every_login' => $this->tips_at_every_login,
            'api_token' => $this->api_token,
            'is_online' => $this->is_online,
            'last_login_at' => $this->last_login_at,
            'status' => Status::make($this->status),
            'type' => Type::make($this->type),
            'visibility' => Visibility::make($this->visibility),
            'roles' => Role::collection($this->roles),
            'fields' => Field::collection($this->fields)->sortByDesc('created_at')->toArray(),
            'websites' => Website::collection($this->websites),
            'files' => File::collection($this->files),
            'carts' => Cart::collection($this->carts)->sortByDesc('created_at')->toArray(),
            'payments' => Payment::collection($this->payments)->sortByDesc('created_at')->toArray(),
            'followers' => $followers,
            'following' => $following,
            'regular_posts' => $regular_posts,
            'created_at' => $this->created_at->format('Y-m-d H:i:s'),
            'updated_at' => $this->updated_at->format('Y-m-d H:i:s')
        ];
    }
}
