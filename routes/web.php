<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BeritaController;

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

// ## HOME ## //
Route::get('/',[HomeController::class,'home'])->name('home');



// ## BERITA ## //
Route::get('/news',[BeritaController::class, 'news'])->name('news');
Route::get('/tambahdata',[BeritaController::class, 'tambahdata'])->name('tambahdata');

// ## TESTIMONI ## //



// ## CATEGORY ## //