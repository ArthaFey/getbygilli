<?php

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

 

// ## BERITA ## //
Route::get('/', function () {
    return view('backend.berita.databerita');
});

// ## TESTIMONI ## //
Route::get('/', function () {
    return view('backend.testimoni.index');
});


// ## CATEGORY ## //