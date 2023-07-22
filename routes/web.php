<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\HomeController;

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

Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/home', [HomeController::class,'index'])->name('home');

Route::prefix(config('app.admin_prefix'))->group(function ()
{
	Auth::routes(['register' => false, 'reset' => false]);

	Route::middleware(['auth', 'superadmin'])->group(function () {

		Route::get('/', [ DashboardController::class,'index' ])->name('admin.index');

		Route::resource('users', UserController::class);
		Route::resource('blogs', BlogController::class);
	});

});
