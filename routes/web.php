<?php

use App\Http\Controllers\homepagecontroller;
use App\Http\Controllers\matericontroller;
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

Route::get('/',[homepagecontroller::class, 'index']);
Route::get('/pdf/{id}',[homepagecontroller::class, 'pdf']);
Route::get('/kuis/{id}',[homepagecontroller::class, 'kuis']);
Route::post('/submit/{id}',[homepagecontroller::class, 'submitKuis']);
Route::get('/materi',[matericontroller::class,'index']);
Route::get('/materi/tambah',[matericontroller::class,'show']);
Route::post('/materi/insert',[matericontroller::class,'insert']);



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
