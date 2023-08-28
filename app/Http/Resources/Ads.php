<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;

class Ads extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'type' => $this->type,
            'image' => $this->image != null ?? asset(Storage::url($this->image)),
            'vidoUrl' => $this->video_url != null ?? asset(Storage::url($this->video_url)),
            'videoDuration' => $this->video_duration,
        ];
    }
}
