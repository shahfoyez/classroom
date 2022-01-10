<?php

use App\Http\Controllers\ClassroomController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GeneralController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\RegisterController;


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
    return view('index');
})->middleware('guest');
Route::get('/dashboard', [GeneralController::class, 'index'])->middleware('auth');

Route::get('/login', [SessionController::class, 'create'])->name('login')->middleware('guest');
Route::post('/session', [SessionController::class, 'store'])->middleware('guest');
Route::post('/logout', [SessionController::class, 'destroy'])->middleware('auth');

Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/signup', [RegisterController::class, 'store']);

Route::post('/createClass', [ClassroomController::class, 'store'])->middleware('auth');
Route::get('/classroom/{classroom}', [ClassroomController::class, 'index'])->middleware('auth');
Route::get('/people/{people}', [ClassroomController::class, 'show'])->middleware('auth');



// Route::post('logout', [SessionController::class, 'destroy'])->middleware('auth');
// Route::get('login', [SessionController::class, 'create'])->middleware('guest');
// Route::post('sessions', [SessionController::class, 'store'])->middleware('guest');
// General Registration


