<?php

namespace App\Http\Resources;

use App\Models\Group as ModelsGroup;
use App\Models\Type as ModelsType;
use App\Models\File as ModelsFile;
use App\Models\Post as ModelsPost;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @author Xanders
 * @see https://team.xsamtech.com/xanderssamoth
 */
class Post extends JsonResource
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
        $file_type_group = ModelsGroup::where('group_name->fr', 'Type de fichier')->first();
        // Types
        $story_type = ModelsType::where([['type_name->fr', 'Story'], ['group_id', $post_type_group->id]])->first();
        $comment_type = ModelsType::where([['type_name->fr', 'Commentaire'], ['group_id', $post_type_group->id]])->first();
        $doc_type = ModelsType::where([['type_name->fr', 'Document'], ['group_id', $file_type_group->id]])->first();
        $image_type = ModelsType::where([['type_name->fr', 'Image'], ['group_id', $file_type_group->id]])->first();
        $audio_type = ModelsType::where([['type_name->fr', 'Audio'], ['group_id', $file_type_group->id]])->first();
        // Requests
        $shared_post = ModelsPost::find($this->shared_post_id);

        if ($this->type_id == $story_type->id) {
            $file = File::collection($this->files)->first();
            $user = User::make($this->user);
            $status = Status::make($this->status);
            $comments_query = ModelsPost::where('answered_for', $this->id)->get();
            $comments = Post::collection($comments_query);

            return [
                'story_id' => (string) $this->id,
                'post_url' => $this->post_url,
                'post_title' => $this->post_title,
                'post_content' => $this->post_content,
                'transformed_post_content' => transformMentionHashtag(getWebURL(), $this->post_content),
                'shared_post_id' => $this->shared_post_id,
                'shared_post' => !empty($shared_post) ? $shared_post : null,
                'price' => $this->price,
                'currency' => $this->currency,
                'quantity' => $this->quantity,
                'answered_for' => $this->answered_for,
                'latitude' => $this->latitude,
                'longitude' => $this->longitude,
                'city' => $this->city,
                'region' => $this->region,
                'country' => $this->country,
                'image_type' => !empty($file) ? (isVideoFile($file->file_url) ? 'video' : 'photo') : 'photo',
                'image_url' => !empty($file) ? getWebURL() . $file->file_url : getWebURL() . '/assets/img/story-placeholder.png',
                'comments' => $comments,
                'created_at' => $this->created_at->format('Y-m-d H:i:s'),
                'updated_at' => $this->updated_at->format('Y-m-d H:i:s'),
                'created_at_ago' => timeAgo($this->created_at->format('Y-m-d H:i:s')),
                'updated_at_ago' => timeAgo($this->updated_at->format('Y-m-d H:i:s')),
                'status_alias' => $status->alias,
                'type_id' => $this->type_id,
                'category_id' => $this->category_id,
                'visibility_id' => $this->visibility_id,
                'user_id' => $this->user_id,
                'owner_firstname' => $user->firstname,
                'owner_lastname' => $user->lastname,
                'owner_username' => $user->username,
                'owner_link' => getWebURL() . '/' . $user->username,
                'owner_avatar' => !empty($user->profile_photo_path) ? getWebURL() . $user->profile_photo_path : null,
                'owner_last_update' => $user->updated_at->format('Y-m-d H:i:s'),
                'coverage_area_id' => $this->coverage_area_id,
                'budget_id' => $this->budget_id,
                'community_id' => $this->community_id,
                'event_id' => $this->event_id,
                'surveychoices' => Surveychoice::collection($this->surveychoices),
            ];

        } else {
            $docs_query = ModelsFile::where([['type_id', $doc_type->id], ['post_id', $this->id]])->get();
            $docs_resource = File::collection($docs_query);
            $docs = $docs_resource->toArray($request);
            $images_query = ModelsFile::where([['type_id', $image_type->id], ['post_id', $this->id]])->get();
            $images_resource = File::collection($images_query);
            $images = $images_resource->toArray($request);
            $audios_query = ModelsFile::where([['type_id', $audio_type->id], ['post_id', $this->id]])->get();
            $audios_resource = File::collection($audios_query);
            $audios = $audios_resource->toArray($request);

            if ($this->type_id == $comment_type->id) {
                return [
                    'id' => $this->id,
                    'post_url' => $this->post_url,
                    'post_content' => $this->post_content,
                    'transformed_post_content' => transformMentionHashtag(getWebURL(), $this->post_content),
                    'shared_post_id' => $this->shared_post_id,
                    'shared_post' => !empty($shared_post) ? $shared_post : null,
                    'latitude' => $this->latitude,
                    'longitude' => $this->longitude,
                    'city' => $this->city,
                    'region' => $this->region,
                    'country' => $this->country,
                    'status' => Status::make($this->status),
                    'type' => Type::make($this->type),
                    'user' => User::make($this->user),
                    'documents' => $docs,
                    'images' => $images,
                    'audios' => $audios,
                    'created_at' => $this->created_at->format('Y-m-d H:i:s'),
                    'updated_at' => $this->updated_at->format('Y-m-d H:i:s'),
                    'created_at_explicit' => hoursDifference($this->created_at->format('Y-m-d H:i:s'), now()) < 24 ? timeAgo($this->created_at->format('Y-m-d H:i:s')) : ($this->created_at->format('Y') == date('Y') ? explicitDayMonth($this->created_at->format('Y-m-d H:i:s')) : explicitDate($this->created_at->format('Y-m-d H:i:s'))),
                    'updated_at_explicit' => hoursDifference($this->created_at->format('Y-m-d H:i:s'), now()) < 24 ? timeAgo($this->created_at->format('Y-m-d H:i:s')) : ($this->updated_at->format('Y') == date('Y') ? explicitDayMonth($this->updated_at->format('Y-m-d H:i:s')) : explicitDate($this->updated_at->format('Y-m-d H:i:s'))),
                    'created_at_ago' => timeAgo($this->created_at->format('Y-m-d H:i:s')),
                    'updated_at_ago' => timeAgo($this->updated_at->format('Y-m-d H:i:s')),
                    'status_id' => $this->status_id,
                    'type_id' => $this->type_id,
                    'user_id' => $this->user_id,
                    'event_id' => $this->event_id
                ];

            } else {
                $comments_query = ModelsPost::where('answered_for', $this->id)->get();
                $comments_resource = Post::collection($comments_query);
                $comments = $comments_resource->toArray($request);

                return [
                    'id' => $this->id,
                    'post_url' => $this->post_url,
                    'post_title' => $this->post_title,
                    'post_content' => $this->post_content,
                    'transformed_post_content' => transformMentionHashtag(getWebURL(), $this->post_content),
                    'shared_post_id' => $this->shared_post_id,
                    'shared_post' => !empty($shared_post) ? $shared_post : null,
                    'price' => $this->price,
                    'currency' => $this->currency,
                    'quantity' => $this->quantity,
                    'answered_for' => $this->answered_for,
                    'is_pinned' => $this->is_pinned,
                    'latitude' => $this->latitude,
                    'longitude' => $this->longitude,
                    'city' => $this->city,
                    'region' => $this->region,
                    'country' => $this->country,
                    'status' => Status::make($this->status),
                    'type' => Type::make($this->type),
                    'category' => Category::make($this->category),
                    'visibility' => Visibility::make($this->visibility),
                    'user' => User::make($this->user),
                    'coverage_area' => CoverageArea::make($this->coverage_area),
                    'budget' => Budget::make($this->budget),
                    'surveychoices' => Surveychoice::collection($this->surveychoices),
                    'documents' => $docs,
                    'images' => $images,
                    'audios' => $audios,
                    'restrictions' => Restriction::collection($this->restrictions),
                    'keywords' => Keyword::collection($this->keywords),
                    'comments' => $comments,
                    'created_at' => $this->created_at->format('Y-m-d H:i:s'),
                    'updated_at' => $this->updated_at->format('Y-m-d H:i:s'),
                    'created_at_explicit' => explicitDateTime($this->created_at->format('Y-m-d H:i:s')),
                    'updated_at_explicit' => explicitDateTime($this->updated_at->format('Y-m-d H:i:s')),
                    'created_at_ago' => timeAgo($this->created_at->format('Y-m-d H:i:s')),
                    'updated_at_ago' => timeAgo($this->updated_at->format('Y-m-d H:i:s')),
                    'status_id' => $this->status_id,
                    'type_id' => $this->type_id,
                    'category_id' => $this->category_id,
                    'visibility_id' => $this->visibility_id,
                    'user_id' => $this->user_id,
                    'coverage_area_id' => $this->coverage_area_id,
                    'budget_id' => $this->budget_id,
                    'community_id' => $this->community_id,
                    'event_id' => $this->event_id
                ];
            }
        }
    }
}
