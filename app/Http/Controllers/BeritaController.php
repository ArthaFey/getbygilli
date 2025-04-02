<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BeritaController extends Controller
{
    public function news(){

        return view('backend.berita.databerita');
    }

    public function tambahberita(){

        return view('backend.berita.uploaddata');
    }
    
    
}
