<?php

namespace App\Repositories;

use App\Repositories\BlogRepository;
use App\Repositories\GameRepository;
use App\Repositories\BannerRepository;
use App\Repositories\LeagueRepository;
use App\Http\Resources\BlogNoPaginateCollection;
use App\Http\Resources\BannerCollection;
use App\Http\Resources\LeagueCollection;
use App\Http\Resources\GameCollection;

class HomeRepository 
{
    public function __construct(BlogRepository $blogRepo, LeagueRepository $leagueRepo, BannerRepository $bannerRepo, GameRepository $gameRepo)
    {
        $this->blogRepo = $blogRepo;
        $this->leagueRepo = $leagueRepo;
        $this->bannerRepo = $bannerRepo;
        $this->gameRepo = $gameRepo;
    }

    public function index()
    {
        $blogs = $this->blogRepo->getLimit(5);
        $banners = $this->bannerRepo->index();
        $leagues = $this->leagueRepo->index();
        $nowGames = $this->gameRepo->nowPlayingWithLimit(3);
        $upGames = $this->gameRepo->upComingWithLimit(3);
        $data = [
            'banners' => new BannerCollection($banners),
            'leagues' => new LeagueCollection($leagues),
            'nowPlayingMatches' => new GameCollection($nowGames),
            'upComingMatches' => new GameCollection($upGames),
            'latestNews' => new BlogNoPaginateCollection($blogs)
        ];
        return $data;
    }
}