<?php

namespace App\Repositories;

use App\Models\League;
use App\Repositories\BaseRepository;

class LeagueRepository extends BaseRepository
{
    public function __construct(League $model)
    {
        $this->model = $model;
    }

    public function index()
    {
       $res = $this->getAll();
       return $res;
    }
}