<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\AdsService;
use App\Http\Resources\AdsCollection;

class AdsController extends Controller
{
    public function __construct(AdsService $adsService)
    {
        $this->adsService = $adsService;
    }

    public function index()
    {
        $res = $this->adsService->index();
        return resSuccess(new AdsCollection($res));
    }
}
