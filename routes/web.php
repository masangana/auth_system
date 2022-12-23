<?php

use App\Http\Controllers\Admin\CategoryController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\User\DashboardController as UserDashboardController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\EventController;
use App\Http\Controllers\Admin\ImageController;
use App\Http\Controllers\Admin\PlaceController;
use App\Http\Controllers\Admin\ServiceController;
use App\Models\Category;
use App\Models\Service;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::group(['prefix' => 'admin'], function() {
    //Route::get('dashboard', [AdminDashboardController::class, 'index'])->middleware('role:admin')->name('admin.dashboard');

    //Route::resource('place', PlaceController::class)->middleware('role:admin');

    Route::middleware(['role:admin'])->group(function () {
        Route::get('dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
        Route::resource('place', PlaceController::class);
        Route::resource('event', EventController::class);
        Route::resource('image', ImageController::class);
        Route::resource('service', ServiceController::class);
        Route::resource('category', CategoryController::class);
    });
});

Route::group(['prefix' => 'user'], function() {
    Route::get('dashboard', [UserDashboardController::class, 'index'])->middleware('role:user')->name('user.dashboard');

});



/*
Route::get('admin/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');

Route::get('user/dashboard', [UserDashboardController::class, 'index'])->name('user.dashboard');
*/