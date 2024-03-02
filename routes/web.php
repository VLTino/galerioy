<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GalleryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Models\gallery;

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
    Route::get('/profile/{id:userid}',[UsersController::class,'show']);
    Route::post('/comments/{post}', [GalleryController::class, 'storeComment'])->name('comments.store');   
    Route::post('/editprofile/{profileid}', [UsersController::class, 'editProfile']); 
    Route::post('/like', [GalleryController::class, 'likePhoto']); 

});


Route::middleware(['auth','UserAccess:admin'])->group(function () {
    // Route::get('/admin',[AdminController::class,'index']);
    Route::get('/admin', function () {
        return view('hal.admin', [
            'title' => 'Admin',
            'gambarcount' => gallery::select(DB::raw('DATE_FORMAT(created_at, "%M") AS date'), DB::raw('COUNT(*) AS count'))
            ->groupBy(DB::raw('DATE_FORMAT(created_at, "%M")'))
            ->orderBy(DB::raw('DATE_FORMAT(created_at, "%M")'))
            ->get()
        ]);
    })->name('dashboard');
    Route::get('/userdata',[AdminController::class,'user']);
    Route::get('/registeradmin',[AdminController::class,'regadmin']);
    Route::post('/regadmin',[UsersController::class,'store']);
    Route::post('/editlevel/{userid}',[UsersController::class,'editLevel']);
    Route::post('/deleteuser/{userid}',[UsersController::class,'destroy']);
});
Route::get('/', [GalleryController::class, 'home']);
Route::get('/gallery/search', [GalleryController::class, 'home']);

Route::get('/logout',[LoginController::class,'logout']);

