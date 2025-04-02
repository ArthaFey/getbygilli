<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TiketController;
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
Route::get('/category/checkSlug',[CategoryController::class,'checkSlug']);
Route::get('/category',[CategoryController::class,'category'])->name('category');
Route::get('/category-tambah',[CategoryController::class,'tambah'])->name('category.tambah');
Route::post('/category-insert',[CategoryController::class,'insert'])->name('category.insert');
Route::get('/category-edit/{id}',[CategoryController::class,'edit'])->name('category.edit');
Route::post('/category-update/{id}',[CategoryController::class,'update'])->name('category.update');
Route::get('/category-delete/{id}',[CategoryController::class,'delete'])->name('category.delete');




// ## TIKET ## //
Route::get('/tiket',[TiketController::class,'tiket'])->name('tiket');