<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;

class Banner extends JsonResource
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
        $date = date_create($this->created_at);
        return [
            'id' => $this->id,
            'image' => asset(Storage::url($this->image)),
            'title' => $this->title,
            'body' => $this->description,
            'createdDate' => date_format($date, 'l d M, Y')
        ];
    }
}
