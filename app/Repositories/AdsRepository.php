<?php

namespace App\Repositories;

use App\Models\Ads;
use App\Repositories\BaseRepository;

class AdsRepository extends BaseRepository
{
    public function __construct(Ads $model)
    {
        $this->model = $model;
    }

    public function index()
    {
       $res = $this->getPaginated();
       return $res;
    }
}