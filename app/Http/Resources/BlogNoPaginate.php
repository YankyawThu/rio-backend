<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BlogNoPaginate extends JsonResource
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
        $date = date_create($this->published_date);
        return [
            'id' => $this->id,
            'image' => asset(Storage::url($this->image)),
            'title' => $this->title,
            'body' => $this->body,
            'publishedDate' => date_format($date, 'l d M, Y')
        ];
    }
}
