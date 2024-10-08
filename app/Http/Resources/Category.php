<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @author Xanders
 * @see https://team.xsamtech.com/xanderssamoth
 */
class Category extends JsonResource
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
            'category_name' => $this->category_name,
            'category_name_fr' => $this->getTranslation('category_name', 'fr'),
            'category_name_en' => $this->getTranslation('category_name', 'en'),
            'category_name_ln' => $this->getTranslation('category_name', 'ln'),
            'category_description' => $this->category_description,
            'category_description_fr' => $this->getTranslation('category_description', 'fr'),
            'category_description_en' => $this->getTranslation('category_description', 'en'),
            'category_description_ln' => $this->getTranslation('category_description', 'ln'),
            'color' => $this->color,
            'icon_font' => $this->icon_font,
            'icon_svg' => $this->icon_svg,
            'image_url' => !empty($this->image_url) ? getWebURL() . '/' . $this->image_url : null,
            'type' => Type::make($this->type),
            'fields' => Field::collection($this->fields),
            'created_at' => $this->created_at->format('Y-m-d H:i:s'),
            'updated_at' => $this->updated_at->format('Y-m-d H:i:s'),
        ];
    }
}
