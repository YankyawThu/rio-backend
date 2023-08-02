<?php

namespace App\Repositories;

use App\Models\Game;
use App\Repositories\BaseRepository;

class GameRepository extends BaseRepository
{
    public function __construct(Game $model)
    {
        $this->model = $model;
    }

    public function nowPlayingWithLimit($limit)
    {
       $res = $this->model->where('started_at' , '<=', date('Y-m-d H:i:s'))->orderBy('started_at', 'desc')->take($limit)->get();
       return $res;
    }

    public function upComingWithLimit($limit)
    {
       $res = $this->model->where('started_at' , '>', date('Y-m-d H:i:s'))->take($limit)->get();
       return $res;
    }
}