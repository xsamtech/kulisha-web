<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @author Xanders
 * @see https://team.xsamtech.com/xanderssamoth
 */
class Visibility extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'visibility_name' => $this->visibility_name,
            'visibility_name_fr' => $this->getTranslation('visibility_name', 'fr'),
            'visibility_name_en' => $this->getTranslation('visibility_name', 'en'),
            'visibility_name_ln' => $this->getTranslation('visibility_name', 'ln'),
            'visibility_description' => $this->visibility_description,
            'visibility_description_fr' => $this->getTranslation('visibility_description', 'fr'),
            'visibility_description_en' => $this->getTranslation('visibility_description', 'en'),
            'visibility_description_ln' => $this->getTranslation('visibility_description', 'ln'),
            'alias' => $this->alias,
            'color' => $this->color,
            'icon_font' => $this->icon_font,
            'icon_svg' => $this->icon_svg,
            'image_url' => !empty($this->image_url) ? getWebURL() . '/' . $this->image_url : null,
            'group' => Group::make($this->group),
            'created_at' => $this->created_at->format('Y-m-d H:i:s'),
            'updated_at' => $this->updated_at->format('Y-m-d H:i:s'),
            'group_id' => $this->group_id
        ];
    }
}
