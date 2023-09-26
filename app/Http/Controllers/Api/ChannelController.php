<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\ChannelService;
use App\Http\Resources\ChannelCollection;

class ChannelController extends Controller
{
    public function __construct(ChannelService $channel)
    {
        $this->channel = $channel;
    }

    public function index()
    {
        $res = $this->channel->index();
        return resSuccess(new ChannelCollection($res));
    }
}
