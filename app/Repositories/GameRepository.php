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
        $time = date('Y-m-d H:i:s', strtotime('-'.config('enums.avgGameduration').' minutes'));
        if($type) {
            $res = $this->model->where('started_at', '>=', $time)->where('started_at', '<', date('Y-m-d H:i:s'))->orderByDesc('started_at');
        }
        else $res = $this->model->where('started_at', '>', date('Y-m-d H:i:s'))->orderBy('started_at');
        
        if($league) {
            $res = $res->where('league_id', $league);
        }
        $res = $res->paginate(config('enums.itemPerPage'));
        return $res;
        
    }

    public function nowPlayingWithLimit($limit)
    {
        $time = date('Y-m-d H:i:s', strtotime('-'.config('enums.avgGameduration').' minutes'));
        $res = $this->model->where('started_at', '>=', $time)->where('started_at', '<', date('Y-m-d H:i:s'))->orderByDesc('started_at')->take($limit)->get();
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

    public function result($date, $league = null)
    {
        $time = date('Y-m-d H:i:s', strtotime('-'.config('enums.avgGameduration').' minutes'));
        $res = $this->model->whereDate('started_at', $date)->where('started_at', '<', $time)->where('started_at', '<', date('Y-m-d H:i:s'))->orderByDesc('started_at');
        if($league) {
            $res = $res->where('league_id', $league);
        }
        $res = $res->paginate(config('enums.itemPerPage'));
        return $res;
    }
}