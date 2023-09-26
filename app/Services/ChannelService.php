<?php

namespace App\Services;

use App\Repositories\ChannelRepository;

class ChannelService
{
    public function __construct(ChannelRepository $channelRepo)
    {
        $this->channelRepo = $channelRepo;
    }

    public function index()
    {
        $res = $this->channelRepo->index();
        return $res;
    }
}