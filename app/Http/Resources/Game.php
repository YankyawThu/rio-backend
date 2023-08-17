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
            'live' => $min > config('enums.avgGameduration') ? 0 : 1,
            'score' => [
                'teamA' => $this->team_a_score,
                'teamb' => $this->team_b_score
            ],
            'startedTime' => date_format($date, 'h:i A M d'),
            'teamA' => new Team($this->teamA),
            'teamB' => new Team($this->teamB),
            'league' => new League($this->league),
            'summary' => $this->description,
            'liveLinks' => new LinkCollection($this->linkWithType(config('enums.linkType.live'))),
            'highlights' => new LinkCollection($this->linkWithType(config('enums.linkType.highlight'))),
            'replayLinks' => new LinkCollection($this->linkWithType(config('enums.linkType.replay')))
        ];
    }
}
