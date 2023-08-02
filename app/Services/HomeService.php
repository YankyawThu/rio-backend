<?php

namespace App\Services;

use App\Repositories\HomeRepository;

class HomeService
{
    public function __construct(HomeRepository $homeRepo)
    {
        $this->homeRepo = $homeRepo;
    }

    public function index()
    {
        $res = $this->homeRepo->index();
        return $res;
    }
}