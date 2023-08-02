<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Game extends JsonResource
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
        $date = date_create($this->started_at);
        return [
            'id' => $this->id,
            'startedTime' => date_format($date, 'h:i A M d'),
            'teamA' => new Team($this->teamA),
            'teamB' => new Team($this->teamB),
            'league' => new League($this->league)
        ];
    }
}
