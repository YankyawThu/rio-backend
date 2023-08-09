<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\BlogController;
use App\Http\Controllers\Api\HomeController;
use App\Http\Controllers\Api\GameController;


Route::get('blog', [BlogController::class, 'index']);
Route::get('blog/{id}', [BlogController::class, 'show']);
Route::get('game', [GameController::class, 'index']);
Route::get('game/{id}', [GameController::class, 'show']);
Route::get('home', [HomeController::class, 'index']);
Route::get('result', [GameController::class, 'result']);
