<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GalleryController;
use Illuminate\Support\Facades\Route;

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

Route::get('/login',[LoginController::class,'index'])->middleware('guest')->name('login');

Route::post('/login', [LoginController::class,'authenticate']);

Route::get('/reg', function () {
    return view('hal.reg666');
});

Route::post('/reg',[UsersController::class,'store']);

Route::middleware(['auth'])->group(function () {
    Route::get('/galeriku',[GalleryController::class,'index']);
});
Route::get('/', [DashboardController::class, 'index']);

Route::get('/logout',[LoginController::class,'logout']);

