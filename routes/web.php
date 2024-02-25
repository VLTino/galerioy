<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GalleryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

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

Route::get('/reg',[UsersController::class,'index']);

Route::post('/reg',[UsersController::class,'store']);

Route::middleware(['auth','UserAccess:user,admin'])->group(function () {
    Route::get('/galeriku',[GalleryController::class,'index'])->name('galeriku');
    Route::get('/detail/{post:gambar}',[GalleryController::class,'detail'])->name('detail');
    Route::get('/edit/{post:gambar}',[GalleryController::class,'edit'])->name('edit');
    Route::get('/galeriku/detail',[GalleryController::class,'galeridetail']);
    Route::get('/upload',[GalleryController::class,'upload']);
    Route::post('/upload',[GalleryController::class,'store']);
    Route::post('/delete/{id:id_photo}',[GalleryController::class, 'destroy']);
    Route::post('/edit/{id:id_photo}',[GalleryController::class,'update']);
});


Route::middleware(['auth','UserAccess:admin'])->group(function () {
    Route::get('/admin',[AdminController::class,'index']);
    Route::get('/userdata',[AdminController::class,'user']);
    Route::get('/registeradmin',[AdminController::class,'regadmin']);
    Route::post('/regadmin',[UsersController::class,'store']);
});
Route::get('/', [GalleryController::class, 'home']);

Route::get('/logout',[LoginController::class,'logout']);

