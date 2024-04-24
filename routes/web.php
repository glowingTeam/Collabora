<?php

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

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/dashboard', function () {
//     return view('dashboard');
// });
Route::get('event', [EventController::class, 'index']);
Route::get('event/{id}', [EventController::class, 'detail'])->where('id', '[0-9]+');

Route::get('/', [PageController::class, 'dashboard']);
Route::get('/create', [PageController::class, 'create']);
Route::get('/login', [PageController::class, 'login']);
Route::get('/register', [PageController::class, 'register']);



Route::get('/page', [SessionController::class, 'index']);
Route::post('/page/login', [SessionController::class, 'masuk']);
// Route::get('/page/register', [SessionController::class, 'logout']);
Route::get('/page/register', [SessionController::class, 'register']);
Route::post('/page/register', [SessionController::class, 'createAcc']);



