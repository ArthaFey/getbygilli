<?php

namespace App\Http\Controllers;
use App\Models\Testimoni;
use Illuminate\Http\Request;

class TestimoniController extends Controller
{
    public function ulasan(){
        $data = Testimoni::all();
        return view('backend.testimoni.index', compact('data'));
    }

    public function tambah_ulasan(){
        return view('backend.testimoni.tambahdata');
    }

    public function insertdata(Request $request){
        // dd($request->all()); 
        $data = Testimoni::create($request->all());

        if ($request->hasFile('foto')) {
            $request->file('foto')->move('fotoprofile/', $request->file('foto')->getClientOriginalName());
            $data->foto = $request->file('foto')->getClientOriginalName();
            $data->save();
        }

        return redirect()->route('ulasan');
    }

    public function editulasan($id){
        $data = Testimoni::find($id);
        return view('backend.testimoni.editulasan', compact('data')); 
    }

    public function updateulasan(Request $request, $id){
        $data = Testimoni::find($id);
        $fotoLama = $data->foto;

       
        $data->update($request->except('foto'));

        
        if ($request->hasFile('foto')) {
           
            if ($fotoLama && file_exists(public_path('fotoprofile/' . $fotoLama))) {
                unlink(public_path('fotoprofile/' . $fotoLama));
            }

            
            $request->file('foto')->move('fotoprofile/', $request->file('foto')->getClientOriginalName());

           
            $data->foto = $request->file('foto')->getClientOriginalName();
            $data->save();
        }

        return redirect()->route('ulasan');
    }

    public function delete($id){
        $data = Testimoni::find($id);

        
        if ($data->foto && file_exists(public_path('fotoprofile/' . $data->foto))) {
            unlink(public_path('fotoprofile/' . $data->foto));
        }

        $data->delete();
        return redirect()->route('ulasan');
    }
}
