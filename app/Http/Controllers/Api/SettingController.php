<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\SettingService;
use App\Http\Resources\Setting;

class SettingController extends Controller
{
    public function __construct(SettingService $settingService)
    {
        $this->settingService = $settingService;
    }

    public function index()
    {
        $res = $this->settingService->index();
        return resSuccess(new Setting($res));
    }
}
