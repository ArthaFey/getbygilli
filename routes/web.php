<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\LoginRegisterController;
use App\Http\Controllers\PerusahaanController;
use App\Http\Controllers\TestimoniController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\OperatorController;


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
Route::get('/category-all/{slug}',[HomeController::class,'category_all'])->name('category.all');
Route::get('/detail-berita/{id}',[HomeController::class,'detail_berita'])->name('detail.berita');


Route::get('/booking-tiket/{slug}',[HomeController::class,'booking_tiket'])->name('booking.tiket');
Route::post('/checkout-payment-tiket',[HomeController::class,'checkout_tiket'])->name('checkout.tiket');
Route::get('/payment-checkout-tiket/{order_id}',[HomeController::class,'payment_checkout'])->name('payment.checkout');
Route::get('/success/{order_id}',[HomeController::class,'success'])->name('payment.success');
Route::post('/midtrans/notification', [HomeController::class, 'handleMidtransNotification']);


Route::get('/all-tiket',[HomeController::class,'all_tiket'])->name('all.tiket');
Route::get('/search-tiket',[HomeController::class,'search_tiket'])->name('search.tiket');


// ## LOGIN & REGISTER ## //
Route::get('/login',[LoginRegisterController::class,'login'])->name('login')->middleware('guest');
Route::post('/login-proses',[LoginRegisterController::class,'proses'])->name('login.proses');



Route::middleware(['auth'])->group(function(){

// ## BERITA ## //
Route::get('/news',[BeritaController::class, 'news'])->name('news');
Route::get('/tambahdata',[BeritaController::class, 'tambahdata'])->name('tambahdata');
Route::post('/insertdata-berita',[BeritaController::class, 'insertdata'])->name('insertdata.berita');
Route::get('/tampilkandata/{id}',[BeritaController::class, 'tampilkandata'])->name('tampilkandata');
Route::post('/updatedata/{id}',[BeritaController::class, 'updatedata'])->name('updatedata');
Route::get('/delete-berita/{id}',[BeritaController::class, 'delete'])->name('delete.berita');


// ## TESTIMONI ## //
Route::get('/ulasan',[TestimoniController::class,'ulasan'])->name('ulasan');
Route::get('/tambah_ulasan',[TestimoniController::class,'tambah_ulasan'])->name('tambah_ulasan');
Route::post('/insertdata',[TestimoniController::class,'insertdata'])->name('insertdata');
Route::get('/editulasan/{id}',[TestimoniController::class,'editulasan'])->name('editulasan');
Route::post('/updateulasan/{id}',[TestimoniController::class,'updateulasan'])->name('updateulasan');
Route::get('/delete-testimoni/{id}',[TestimoniController::class,'delete'])->name('delete.testimoni');



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


// ## FOTO TRANSPORTASI ## //
Route::get('/deskripsi-perjalanan-show/{id}',[PerusahaanController::class,'showdeskripsi'])->name('deskripsi.show');
Route::get('/deskripsi-perjalanan-tambah/{id}',[PerusahaanController::class,'tambahdeskripsi'])->name('deskripsi.tambah');
Route::post('/deskripsi-perjalanan-insert/{id}',[PerusahaanController::class,'insertdeskripsi'])->name('deskripsi.insert');
Route::get('/deskripsi-perjalanan-edit/{id}',[PerusahaanController::class,'editdeskripsi'])->name('deskripsi.edit');
Route::post('/deskripsi-perjalanan-update/{id}',[PerusahaanController::class,'updatedeskripsi'])->name('deskripsi.update');
Route::get('/deskripsi-perjalanan-delete/{id}',[PerusahaanController::class,'deletedeskripsi'])->name('deskripsi.delete');

// ## TRANSACTION ## //
Route::get('/transaction',[TransactionController::class,'transaksi'])->name('transaksi');
Route::get('/transaction/{id}',[TransactionController::class,'transaksiShow'])->name('transaksi.show');
Route::get('/payment/{id}/mark-as-read', [TransactionController::class, 'markAsRead'])->name('payment.markAsRead');
});

// ## SPEED BOAT OPERATOR ## //
Route::get('/operator',[OperatorController::class, 'operator'])->name('operator');
Route::get('/tambahopt',[OperatorController::class, 'tambahopt'])->name('tambahopt');
Route::post('/insertopt',[OperatorController::class, 'insertopt'])->name('insertopt');
Route::get('/tampilkanopt/{id}',[OperatorController::class, 'tampilkanopt'])->name('tampilkanopt');
Route::post('/updateopt/{id}',[OperatorController::class, 'updateopt'])->name('updateopt');
Route::get('/deleteopt/{id}',[OperatorController::class, 'deleteopt'])->name('deleteopt');

