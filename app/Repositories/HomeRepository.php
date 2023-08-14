<?php

namespace App\Repositories;

use App\Repositories\BlogRepository;
use App\Repositories\GameRepository;
use App\Repositories\BannerRepository;
use App\Repositories\LeagueRepository;
use App\Repositories\ChannelRepository;
use App\Http\Resources\BlogNoPaginateCollection;
use App\Http\Resources\BannerCollection;
use App\Http\Resources\LeagueCollection;
use App\Http\Resources\ChannelCollection;
use App\Http\Resources\GameNoPaginateCollection;

class HomeRepository 
{
    public function __construct(BlogRepository $blogRepo, LeagueRepository $leagueRepo, BannerRepository $bannerRepo, GameRepository $gameRepo, ChannelRepository $channelRepo)
    {
        $this->blogRepo = $blogRepo;
        $this->leagueRepo = $leagueRepo;
        $this->bannerRepo = $bannerRepo;
        $this->gameRepo = $gameRepo;
        $this->channelRepo = $channelRepo;
    }

    public function index()
    {
        $blogs = $this->blogRepo->getLimit(5);
        $banners = $this->bannerRepo->index();
        $leagues = $this->leagueRepo->index();
        $nowGames = $this->gameRepo->nowPlayingWithLimit(3);
        $upGames = $this->gameRepo->upComingWithLimit(3);
        $channels = $this->channelRepo->index();
        $data = [
            'banners' => new BannerCollection($banners),
            'leagues' => new LeagueCollection($leagues),
            'nowPlayingMatches' => new GameNoPaginateCollection($nowGames),
            'upComingMatches' => new GameNoPaginateCollection($upGames),
            'liveChannels' => new ChannelCollection($channels),
            'latestNews' => new BlogNoPaginateCollection($blogs)
        ];
        return $data;
    }
}