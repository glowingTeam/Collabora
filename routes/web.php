<?php

use App\Http\Controllers\AccountController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;
use App\Http\Controllers\EventRegistController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\SessionController;

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

Route::get('/dashboard', function () {
    $accounts = App\Models\Account::all();
    $events = App\Models\Event::all();
    return view('page.dashboard',['events'=>$events]);
});

//Event
Route::resource('/event', EventController::class);
Route::get('/event', [EventController::class, 'search']);
Route::get('/event/show/{id}', [EventController::class, 'show']);

Route::post('/event_regist/addeventregist', [EventRegistController::class, 'addeventregist']);
Route::get('/volunteer', [EventRegistController::class, 'index']);

Route::resource('/account', AccountController::class);
Route::post('/masuk', [SessionController::class, 'masuk']);
Route::get('/logout', [SessionController::class, 'logout']);
Route::get('/forgot-password', function () {
    return view('page.forgot-pass');
});
// Route::get('/account/forgot', [AccountController::class, 'forgot']);

Route::get('/admin/manage-event', [EventController::class, 'index'])->name('index');
Route::get('/event/{event}', [EventController::class, 'update']);
// Route::get('/event/{event}', [EventController::class, 'update']);

Route::get('/admin/manage-account', [AccountController::class, 'manage'])->name('manage');



