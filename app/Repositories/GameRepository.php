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
    
    public function index($type, $league = null)
    {
        $this->time = date('Y-m-d H:i:s', strtotime('-'.config('enums.avgGameduration').' minutes'));
        if($type) {
            if($league) {
                $res = $this->model->where('started_at', '>=', $this->time)->where('started_at', '<', date('Y-m-d H:i:s'))->where('league_id', $league)->orderByDesc('started_at')->paginate();
            }
            else $res = $this->model->where('started_at', '>=', $this->time)->where('started_at', '<', date('Y-m-d H:i:s'))->orderByDesc('started_at')->paginate();
        }
        else {
            if($league) {
                $res = $this->model->where('started_at', '>', date('Y-m-d H:i:s'))->where('league_id', $league)->orderBy('started_at')->paginate();
            }
            else $res = $this->model->where('started_at', '>', date('Y-m-d H:i:s'))->orderBy('started_at')->paginate();
        }
        return $res;
        
    }

    public function nowPlayingWithLimit($limit)
    {
        $this->time = date('Y-m-d H:i:s', strtotime('-'.config('enums.avgGameduration').' minutes'));
        $res = $this->model->where('started_at', '>=', $this->time)->where('started_at', '<', date('Y-m-d H:i:s'))->orderByDesc('started_at')->take($limit)->get();
        return $res;
    }

    public function upComingWithLimit($limit)
    {
        $res = $this->model->where('started_at', '>', date('Y-m-d H:i:s'))->orderBy('started_at')->take($limit)->get();
        return $res;
    }

    public function show($id)
    {
        $res = $this->getById($id);
        return $res;
    }
}