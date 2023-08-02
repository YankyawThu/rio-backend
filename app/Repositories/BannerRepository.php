<?php

namespace App\Repositories;

use App\Models\Banner;
use App\Repositories\BaseRepository;

class BannerRepository extends BaseRepository
{
    public function __construct(Banner $model)
    {
        $this->model = $model;
    }

    public function index()
    {
       $res = $this->getAll();
       return $res;
    }
}