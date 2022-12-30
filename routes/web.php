<?php

use App\Http\Controllers\Admin\CategoryController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\User\DashboardController as UserDashboardController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\EventController;
use App\Http\Controllers\Admin\ImageController;
use App\Http\Controllers\Admin\PlaceController;
use App\Http\Controllers\Admin\ScheduleController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\TypeController;
use App\Http\Controllers\User\CommentController;
use App\Http\Controllers\User\PlaceController as UserPlaceController;
use App\Http\Controllers\User\EventController as UserEventController;
use App\Http\Controllers\User\FilterController;
use App\Http\Controllers\User\ContactController;
use App\Models\Category;
use App\Models\Schedule;
use App\Models\Service;
use App\Models\Type;

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
})->name('index');

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
        Route::resource('type', TypeController::class);
        Route::post('place/schedule',[ ScheduleController::class, 'place'])->name('schedule.place');
        Route::post('event/schedule',[ ScheduleController::class, 'event'])->name('schedule.event');
    });
});

Route::group(['prefix' => 'user'], function() {

    Route::middleware(['role:user'])->group(function () {
        Route::get('dashboard', [UserDashboardController::class, 'index'])->name('user.dashboard');
        /*Route::get('places', [UserPlaceController::class, 'index'])->name('user.place.index');
        Route::get('places/{place}', [UserPlaceController::class, 'show'])->name('user.place.show');
        Route::get('events', [UserEventController::class, 'index'])->name('user.event.index');
        Route::get('events/{event}', [UserEventController::class, 'show'])->name('user.event.show');*/
        Route::resource('places', UserPlaceController::class);
        Route::resource('events', UserEventController::class);
        Route::get('services/filter', [FilterController::class, 'services'])->name('services.filter');
        Route::get('filter/events', [FilterController::class, 'events'])->name('events.filter');
        Route::resource('comments', CommentController::class);
    });
    }
);

Route::get('contact', [ContactController::class, 'contact'])->name('contact.mail');
