<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\BlogController;
use App\Http\Controllers\Api\HomeController;


Route::get('blog', [BlogController::class, 'index']);
Route::get('blog/{id}', [BlogController::class, 'show']);
Route::get('home', [HomeController::class, 'index']);
