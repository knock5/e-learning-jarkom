<?php

use App\Http\Controllers\homepagecontroller;
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
Route::get('/pdf',[homepagecontroller::class, 'pdf']);


// routes/web.php
Route::get('/pdf-viewer', function () {
    $path = storage_path('app/public/materi1.pdf'); // Sesuaikan dengan path file PDF Anda

    if (!File::exists($path)) {
        abort(404);
    }

    

    return response()->file($path);
})->middleware('pdf.viewer');


