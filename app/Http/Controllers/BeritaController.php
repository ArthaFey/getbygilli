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
        $data = Berita::create($request->all());
        if ($request->hasfile('image')) {
            $request->file('image')->move('fotoberita/', $request->file('image')->getClientOriginalName() );
            $data->image = $request->file('image')->getClientOriginalName();
            $data->save();
        }
        return redirect()->route('news')->with('insert','Add Data Success');
    }
    public function tampilkandata($id){

        $data = Berita::find($id);
        return view('backend.berita.editberita', compact('data'));

    }
    public function updatedata(Request $request, $id){
        $data = Berita::find($id);
        $data->update($request->all());
        if ($request->hasfile('image')) {
            $request->file('image')->move('fotoberita/', $request->file('image')->getClientOriginalName() );
            $data->image = $request->file('image')->getClientOriginalName();
            $data->save();
        }
        return redirect()->route('news')->with('update','Update Data Success');
    }
    public function delete($id){

        $data = Berita::find($id);
        $data->delete();
        return redirect()->route('news')->with('delete','Delete Data Success');

    }
    
}
