<?php

use App\Http\Controllers\homepagecontroller;
use App\Http\Controllers\matericontroller;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response;

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

// routes/web.php
// Route::get('/pdf-viewer', function () {
//     $path = storage_path('app/public/materi1.pdf'); // Sesuaikan dengan path file PDF Anda

//     if (!File::exists($path)) {
//         abort(404);
//     }

    

//     return response()->file($path);
// })->middleware('pdf.viewer');get



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
