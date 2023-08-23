<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\ChannelController;
use App\Http\Controllers\Admin\LeagueController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\TeamController;
use App\Http\Controllers\Admin\GameController;
use App\Http\Controllers\Admin\GameLinkController;
use App\Http\Controllers\Admin\ResultLinkController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\ResultController;
use App\Http\Controllers\Admin\NotiController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/admin', function () {
    return redirect()->route('login');
});

Route::get('/', [HomeController::class,'index'])->name('home');

Route::prefix(config('app.admin_prefix'))->group(function ()
{
	Auth::routes(['register' => false, 'reset' => false]);

	Route::middleware('auth')->group(function () {

		Route::get('/', [ DashboardController::class,'index' ])->name('admin.index');

		Route::resource('users', UserController::class);
		Route::resource('banners', BannerController::class);
		Route::resource('blogs', BlogController::class);
		Route::resource('channels', ChannelController::class);
		Route::resource('leagues', LeagueController::class);
		Route::resource('teams', TeamController::class);
		Route::get('league-teams', [TeamController::class,'teamsByLeagueId'])->name('leagues.teams');
		Route::resource('games', GameController::class);
		Route::resource('results', ResultController::class);
		Route::resource('game-links', GameLinkController::class);
		Route::resource('result-links', ResultLinkController::class);
		Route::resource('setting', SettingController::class);
		Route::get('notification', [NotiController::class, 'index'])->name('notification.index');
		Route::post('notification/send', [NotiController::class, 'sendCustomNoti'])->name('notification.send');
	});

});