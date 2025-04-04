<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PerusahaanController;
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
Route::post('/insertdata',[BeritaController::class, 'insertdata'])->name('insertdata');
// ## TESTIMONI ## //



// ## CATEGORY ## //
Route::get('/category/checkSlug',[CategoryController::class,'checkSlug']);
Route::get('/category',[CategoryController::class,'category'])->name('category');
Route::get('/category-tambah',[CategoryController::class,'tambah'])->name('category.tambah');
Route::post('/category-insert',[CategoryController::class,'insert'])->name('category.insert');
Route::get('/category-edit/{id}',[CategoryController::class,'edit'])->name('category.edit');
Route::post('/category-update/{id}',[CategoryController::class,'update'])->name('category.update');
Route::get('/category-delete/{id}',[CategoryController::class,'delete'])->name('category.delete');



// ## PERUSAHAAN ## //
Route::get('/perusahaan/checkSlug',[PerusahaanController::class,'checkSlug']);
Route::get('/perusahaan',[PerusahaanController::class,'perusahaan'])->name('perusahaan');
Route::get('/perusahaan-tambah',[PerusahaanController::class,'tambah'])->name('perusahaan.tambah');
Route::post('/perusahaan-insert',[PerusahaanController::class,'insert'])->name('perusahaan.insert');
Route::get('/perusahaan-edit/{id}',[PerusahaanController::class,'edit'])->name('perusahaan.edit');
Route::post('/perusahaan-update/{id}',[PerusahaanController::class,'update'])->name('perusahaan.update');
Route::get('/perusahaan-delete/{id}',[PerusahaanController::class,'delete'])->name('perusahaan.delete');


// ## TIKET ## //
Route::get('/tiket/checkSlug',[PerusahaanController::class,'slugCheck']);
Route::get('/tiket-show/{id}',[PerusahaanController::class,'showTiket'])->name('tiket.show');
Route::get('/tiket-tambah/{id}',[PerusahaanController::class,'tambahTiket'])->name('tiket.tambah');
Route::post('/tiket-insert/{id}',[PerusahaanController::class,'insertTiket'])->name('tiket.insert');
Route::get('/tiket-edit/{id}',[PerusahaanController::class,'editTiket'])->name('tiket.edit');
Route::post('/tiket-update/{id}',[PerusahaanController::class,'updateTiket'])->name('tiket.update');
Route::get('/tiket-delete/{id}',[PerusahaanController::class,'deleteTiket'])->name('tiket.delete');

// ## FOTO TRANSPORTASI ## //
Route::get('/foto-transportasi-show/{id}',[PerusahaanController::class,'showfoto'])->name('foto.show');
Route::get('/foto-transportasi-tambah/{id}',[PerusahaanController::class,'tambahfoto'])->name('foto.tambah');
Route::post('/foto-transportasi-insert/{id}',[PerusahaanController::class,'insertfoto'])->name('foto.insert');
Route::get('/foto-transportasi-edit/{id}',[PerusahaanController::class,'editfoto'])->name('foto.edit');
Route::post('/foto-transportasi-update/{id}',[PerusahaanController::class,'updatefoto'])->name('foto.update');
Route::get('/foto-transportasi-delete/{id}',[PerusahaanController::class,'deletefoto'])->name('foto.delete');



