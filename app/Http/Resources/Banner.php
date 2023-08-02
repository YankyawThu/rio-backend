<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

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
            'image' => asset($this->image),
            'title' => $this->title,
            'createdDate' => date_format($date, 'l d M, Y')
        ];
    }
}
