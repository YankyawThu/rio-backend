<?php

namespace App\Services;

use App\Repositories\BlogRepository;

class BlogService
{
    public function __construct(BlogRepository $blogRepo)
    {
        $this->blogRepo = $blogRepo;
    }

    public function get($page)
    {
        $res = $this->blogRepo->get($page);
        return $res;
    }

    public function show($id)
    {
        $res = $this->blogRepo->show($id);
        return $res;
    }
}