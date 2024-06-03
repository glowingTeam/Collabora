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
Route::get('/event', [EventController::class, 'index']);
Route::post('/event', [EventController::class, 'store']);
Route::get('/event/edit/{id}', [EventController::class, 'edit']);
Route::get('/event/{id}', [EventController::class, 'destroy']); 
Route::get('/event/create', [EventController::class, 'create']);
Route::get('/event/search', [EventController::class, 'search']);
Route::get('/event/show/{id}', [EventController::class, 'show']);

Route::post('/event_regist/addeventregist/{event}', [EventRegistController::class, 'addeventregist'])->name('regist.event');
Route::get('/volunteer', [EventRegistController::class, 'index']);
Route::get('/volunteer/show/{event}', [EventRegistController::class, 'show'])->name('show.volunteer');
Route::get('/volunteer/showAaccepted/{event}', [EventRegistController::class, 'showAccepted'])->name('show.accepted.volunteer');
Route::get('/volunteer/deny/{id}', [EventRegistController::class, 'deny'])->name('deny.volunteer');
Route::get('/volunteer/accept/{id}', [EventRegistController::class, 'accept'])->name('accept.volunteer');

Route::resource('/account', AccountController::class);
Route::post('/masuk', [SessionController::class, 'masuk']);
Route::get('/logout', [SessionController::class, 'logout']);
Route::get('/forgot-password', function () {
    return view('page.forgot-pass');
});
// Route::get('/account/forgot', [AccountController::class, 'forgot']);

Route::get('/admin/manage-event', [EventController::class, 'index'])->name('index');
Route::get('/admin/event/create', [EventController::class, 'create']);
Route::get('/admin/event/create', [EventController::class, 'create']);
Route::get('/event/{event}', [EventController::class, 'update']);
// Route::get('/event/{event}', [EventController::class, 'update']);

Route::get('/admin/manage-account', [AccountController::class, 'manage'])->name('manage');



