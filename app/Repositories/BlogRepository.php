<?php

namespace App\Repositories;

use App\Models\Blog;
use App\Repositories\BaseRepository;

class BlogRepository extends BaseRepository
{
    public function __construct(Blog $model)
    {
        $this->model = $model;
    }

    public function get($page)
    {
       $res = $this->getPaginated($page);
       return $res;
    }
}