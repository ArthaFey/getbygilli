<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use Illuminate\Http\Request;

class BeritaController extends Controller
{
    public function news(){
        $data = Berita::all();
        return view('backend.berita.databerita', compact('data'));
    }

    public function tambahdata(){

        return view('backend.berita.uploaddata');
    }
    public function insertdata(Request $request){
        dd($request->all());
        Berita::create($request->all());
    }
    
}
