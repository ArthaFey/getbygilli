<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\TestimoniController;
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

// ## HOME ## //
Route::get('/',[HomeController::class,'home'])->name('home');
// ## BERITA ## //


// ## TESTIMONI ## //
Route::get('/ulasan',[TestimoniController::class,'ulasan'])->name('ulasan');


Route::get('/tambah_ulasan',[TestimoniController::class,'tambah_ulasan'])->name('tambah_ulasan');
Route::post('/insertdata',[TestimoniController::class,'insertdata'])->name('insertdata');

Route::get('/editulasan/{id}',[TestimoniController::class,'editulasan'])->name('editulasan');
Route::post('/updateulasan/{id}',[TestimoniController::class,'updateulasan'])->name('updateulasan');
Route::get('/delete/{id}',[TestimoniController::class,'delete'])->name('delete');
// ## CATEGORY ## //