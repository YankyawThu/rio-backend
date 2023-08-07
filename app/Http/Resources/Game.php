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
        $from_time = strtotime($this->started_at);
        $to_time = strtotime(date('Y-m-d H:i:s'));
        $min = round(($to_time - $from_time) / 60);
        return [
            'id' => $this->id,
            'live' => $min > 100 ? 0 : 1,
            'startedTime' => date_format($date, 'h:i A M d'),
            'teamA' => new Team($this->teamA),
            'teamB' => new Team($this->teamB),
            'league' => new League($this->league),
            'summary' => $this->description,
            'liveLinks' => $min > 100 ? [] : new LinkCollection($this->links)
        ];
    }
}
