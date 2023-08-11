<?php

namespace App\Services;

use App\Repositories\SettingRepository;

class SettingService
{
    public function __construct(SettingRepository $settingRepo)
    {
        $this->settingRepo = $settingRepo;
    }

    public function index()
    {
        $res = $this->settingRepo->index();
        return $res;
    }
}