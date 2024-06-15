<?php

use App\Http\Controllers\akunkontroller;
use App\Http\Controllers\homepagecontroller;
use App\Http\Controllers\matericontroller;
use App\Http\Controllers\updatecontroller;
use App\Http\Controllers\usercontroller;
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
Route::get('/update',[updatecontroller::class,'index']);


Route::middleware(['auth', 'user'])->group( function () {
    Route::get('/',[homepagecontroller::class, 'index']);
    Route::get('/pdf/{id}',[homepagecontroller::class, 'pdf']);
    Route::get('/kuis/{id}',[homepagecontroller::class, 'kuis']);
    Route::post('/submit/{id}',[homepagecontroller::class, 'submitKuis']); 
});
    Route::middleware(['auth', 'admin'])->group( function () {
    Route::get('/materi',[matericontroller::class,'index']);
    Route::get('/materi/tambah',[matericontroller::class,'show']);
    Route::post('/materi/insert',[matericontroller::class,'insert']);
    Route::get('/materi/lihat/{id}',[matericontroller::class,'lihat']);
    Route::post('/materi/update/{id}',[matericontroller::class,'update']);
    Route::get('/materi/hapus/{id}',[matericontroller::class,'hapus']);
    Route::get('/akun',[akunkontroller::class, 'index']);
    Route::get('/akun/tambah',[akunkontroller::class, 'show']); 
    Route::post('/akun/insert',[akunkontroller::class, 'tambah']); 
    Route::delete('/akun/hapus/{id}',[akunkontroller::class, 'hapus']);

});



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
