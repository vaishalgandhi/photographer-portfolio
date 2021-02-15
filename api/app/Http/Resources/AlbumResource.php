<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AlbumResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request
     *
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id'            => $this->id,
            'photographer_id' => $this->photographer_id,
            'title'           => $this->title,
            'description'     => $this->description,
            'img'           => $this->img,
            'date' => $this->date,
            'featured' => $this->featured
        ];
    }
}