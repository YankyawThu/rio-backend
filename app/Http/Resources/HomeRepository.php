<?php

namespace App\Repositories;

use App\Repositories\BlogRepository;
use App\Repositories\BannerRepository;
use App\Repositories\LeagueRepository;
use App\Http\Resources\BlogNoPaginateCollection;
use App\Http\Resources\BannerCollection;
use App\Http\Resources\LeagueCollection;

class HomeRepository 
{
    public function __construct(BlogRepository $blogRepo, LeagueRepository $leagueRepo, BannerRepository $bannerRepo)
    {
        $this->blogRepo = $blogRepo;
        $this->leagueRepo = $leagueRepo;
        $this->bannerRepo = $bannerRepo;
    }

    public function index()
    {
        $blogs = $this->blogRepo->getLimit(5);
        $banners = $this->bannerRepo->index();
        $leagues = $this->leagueRepo->index();
        $data = [
            'banners' => new BannerCollection($banners),
            'leagues' => new LeagueCollection($leagues),
            'latestNews' => new BlogNoPaginateCollection($blogs)
        ];
        return $data;
    }
}