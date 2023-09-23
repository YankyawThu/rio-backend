<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\BlogController;
use App\Http\Controllers\Api\HomeController;
use App\Http\Controllers\Api\GameController;
use App\Http\Controllers\Api\SettingController;
use App\Http\Controllers\Api\DeviceController;
use App\Http\Controllers\Api\AdsController;
use App\Http\Controllers\Api\ChannelController;
use App\Http\Middleware\Authorize;

Route::middleware([Authorize::class])->group(function () {
    Route::get('blog', [BlogController::class, 'index']);
    Route::get('blog/{id}', [BlogController::class, 'show']);
    Route::get('game', [GameController::class, 'index']);
    Route::get('game/{id}', [GameController::class, 'show']);
    Route::get('home', [HomeController::class, 'index']);
    Route::get('result', [GameController::class, 'result']);
    Route::get('setting', [SettingController::class, 'index']);
    Route::post('device-token', [DeviceController::class, 'store']);
    Route::get('ads', [AdsController::class, 'index']);
    Route::get('live-channels', [ChannelController::class, 'index']);
});