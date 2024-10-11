<?php

namespace App\Http\Resources;

use App\Models\Group as ModelsGroup;
use App\Models\Type as ModelsType;
use App\Models\File as ModelsFile;
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
        $doc_type = ModelsType::where([['type_name->fr', 'Document'], ['group_id', $file_type_group->id]])->first();
        $image_type = ModelsType::where([['type_name->fr', 'Image'], ['group_id', $file_type_group->id]])->first();
        $audio_type = ModelsType::where([['type_name->fr', 'Audio'], ['group_id', $file_type_group->id]])->first();

        if ($this->type_id == $story_type->id) {
            $file = File::collection($this->files)->first();

            if (is_null($file)) {
                return [
                    'story_id' => $this->id,
                    'post_url' => $this->post_url,
                    'post_title' => $this->post_title,
                    'post_content' => $this->post_content,
                    'shared_post_id' => $this->shared_post_id,
                    'price' => $this->price,
                    'currency' => $this->currency,
                    'quantity' => $this->quantity,
                    'answered_for' => $this->answered_for,
                    'latitude' => $this->latitude,
                    'longitude' => $this->longitude,
                    'city' => $this->city,
                    'region' => $this->region,
                    'country' => $this->country,
                    // 'status' => Status::make($this->status),
                    // 'type' => Type::make($this->type),
                    // 'category' => Category::make($this->category),
                    // 'visibility' => Visibility::make($this->visibility),
                    // 'user' => User::make($this->user),
                    // 'coverage_area' => CoverageArea::make($this->coverage_area),
                    // 'budget' => Budget::make($this->budget),
                    // 'surveychoices' => Surveychoice::collection($this->surveychoices),
                    'image' => null,
                    'image_type' => null,
                    // 'restrictions' => Restriction::collection($this->restrictions),
                    // 'keywords' => Keyword::collection($this->keywords),
                    'created_at' => $this->created_at->format('Y-m-d H:i:s'),
                    'updated_at' => $this->updated_at->format('Y-m-d H:i:s'),
                    // 'created_at_explicit' => $this->created_at->format('Y') == date('Y') ? explicitDayMonth($this->created_at->format('Y-m-d H:i:s')) : explicitDate($this->created_at->format('Y-m-d H:i:s')),
                    // 'updated_at_explicit' => $this->updated_at->format('Y') == date('Y') ? explicitDayMonth($this->updated_at->format('Y-m-d H:i:s')) : explicitDate($this->updated_at->format('Y-m-d H:i:s')),
                    // 'created_at_ago' => timeAgo($this->created_at->format('Y-m-d H:i:s')),
                    // 'updated_at_ago' => timeAgo($this->updated_at->format('Y-m-d H:i:s')),
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

            } else {
                $is_video = isVideoFile($file->file_url);

                return [
                    'story_id' => $this->id,
                    'post_url' => $this->post_url,
                    'post_title' => $this->post_title,
                    'post_content' => $this->post_content,
                    'shared_post_id' => $this->shared_post_id,
                    'price' => $this->price,
                    'currency' => $this->currency,
                    'quantity' => $this->quantity,
                    'answered_for' => $this->answered_for,
                    'latitude' => $this->latitude,
                    'longitude' => $this->longitude,
                    'city' => $this->city,
                    'region' => $this->region,
                    'country' => $this->country,
                    // 'status' => Status::make($this->status),
                    // 'type' => Type::make($this->type),
                    // 'category' => Category::make($this->category),
                    // 'visibility' => Visibility::make($this->visibility),
                    // 'user' => User::make($this->user),
                    // 'coverage_area' => CoverageArea::make($this->coverage_area),
                    // 'budget' => Budget::make($this->budget),
                    // 'surveychoices' => Surveychoice::collection($this->surveychoices),
                    'image' => $file,
                    'image_type' => $is_video ? 'video' : 'photo',
                    // 'restrictions' => Restriction::collection($this->restrictions),
                    // 'keywords' => Keyword::collection($this->keywords),
                    'created_at' => $this->created_at->format('Y-m-d H:i:s'),
                    'updated_at' => $this->updated_at->format('Y-m-d H:i:s'),
                    // 'created_at_explicit' => $this->created_at->format('Y') == date('Y') ? explicitDayMonth($this->created_at->format('Y-m-d H:i:s')) : explicitDate($this->created_at->format('Y-m-d H:i:s')),
                    // 'updated_at_explicit' => $this->updated_at->format('Y') == date('Y') ? explicitDayMonth($this->updated_at->format('Y-m-d H:i:s')) : explicitDate($this->updated_at->format('Y-m-d H:i:s')),
                    // 'created_at_ago' => timeAgo($this->created_at->format('Y-m-d H:i:s')),
                    // 'updated_at_ago' => timeAgo($this->updated_at->format('Y-m-d H:i:s')),
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

        } else {
            $docs = ModelsFile::where([['type_id', $doc_type->id], ['post_id', $this->id]])->get();
            $images = ModelsFile::where([['type_id', $image_type->id], ['post_id', $this->id]])->get();
            $audios = ModelsFile::where([['type_id', $audio_type->id], ['post_id', $this->id]])->get();

            return [
                'id' => $this->id,
                'post_url' => $this->post_url,
                'post_title' => $this->post_title,
                'post_content' => $this->post_content,
                'shared_post_id' => $this->shared_post_id,
                'price' => $this->price,
                'currency' => $this->currency,
                'quantity' => $this->quantity,
                'answered_for' => $this->answered_for,
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
                'created_at' => $this->created_at->format('Y-m-d H:i:s'),
                'updated_at' => $this->updated_at->format('Y-m-d H:i:s'),
                'created_at_explicit' => $this->created_at->format('Y') == date('Y') ? explicitDayMonth($this->created_at->format('Y-m-d H:i:s')) : explicitDate($this->created_at->format('Y-m-d H:i:s')),
                'updated_at_explicit' => $this->updated_at->format('Y') == date('Y') ? explicitDayMonth($this->updated_at->format('Y-m-d H:i:s')) : explicitDate($this->updated_at->format('Y-m-d H:i:s')),
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
