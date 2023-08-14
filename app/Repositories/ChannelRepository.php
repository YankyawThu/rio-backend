<?php

namespace App\Repositories;

use App\Models\Channel;
use App\Repositories\BaseRepository;

class ChannelRepository extends BaseRepository
{
    public function __construct(Channel $model)
    {
        $this->model = $model;
    }

    public function index()
    {
       $res = $this->getAll();
       return $res;
    }
}