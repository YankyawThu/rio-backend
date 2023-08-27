<?php

namespace App\Services;

use App\Repositories\AdsRepository;

class AdsService
{
    public function __construct(AdsRepository $adsRepo)
    {
        $this->adsRepo = $adsRepo;
    }

    public function index()
    {
        $res = $this->adsRepo->index();
        return $res;
    }
}