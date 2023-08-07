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

    public function index()
    {
       $res = $this->getPaginated();
       return $res;
    }

    public function show($id)
    {
       $res = $this->getById($id);
       return $res;
    }
}