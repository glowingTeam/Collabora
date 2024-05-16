<?php

use App\Http\Controllers\AccountController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;
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
    $events = \App\Models\event::all();
    return view('page/dashboard',['events'=>$events]);
});

//Event
Route::resource('/event', EventController::class);
Route::get('/event', [EventController::class, 'search']);


Route::resource('/account', AccountController::class);
Route::post('/masuk', [SessionController::class, 'masuk']);


Route::get('/admin/manage-event', [EventController::class, 'index'])->name('index');
Route::get('/event/{event}', [EventController::class, 'update']);

Route::get('/admin/manage-account', [AccountController::class, 'manage'])->name('manage');
Route::get('account/{id}/edit', [AccountController::class, 'edit'])->name('account.edit');
Route::put('/account/{account}', [AccountController::class, 'update'])->name('update');


