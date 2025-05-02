<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\Testimoni;
use Illuminate\Http\Request;

class TestimoniController extends Controller
{
    public function ulasan(Request $request){
        $search = $request->search;
        $data = Testimoni::orderByDesc('created_at')
        ->where('nama','like', '%' . $search . '%')
        ->paginate(10);
        $unread = Payment::where('is_read', false)
                     ->where('status', 'success')
                     ->count();
        return view('backend.testimoni.index', compact('data','unread'));
    }

    public function tambah_ulasan(){
        $unread = Payment::where('is_read', false)
                     ->where('status', 'success')
                     ->count();
        return view('backend.testimoni.tambahdata',compact('unread'));
    }

    public function insertdata(Request $request){
        // dd($request->all()); 
        $data = Testimoni::create($request->all());

        if ($request->hasFile('foto')) {
            $request->file('foto')->move('fotoprofile/', $request->file('foto')->getClientOriginalName());
            $data->foto = $request->file('foto')->getClientOriginalName();
            $data->save();
        }

        return redirect()->route('ulasan')->with('insert','Add Data Success');
    }

    public function editulasan($id){
       $unread = Payment::where('is_read', false)
                     ->where('status', 'success')
                     ->count();
        $data = Testimoni::find($id);
        return view('backend.testimoni.editulasan', compact('data','unread')); 
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

        return redirect()->route('ulasan')->with('update','Update Data Success');
    }

    public function delete($id){
        $data = Testimoni::find($id);

        
        if ($data->foto && file_exists(public_path('fotoprofile/' . $data->foto))) {
            unlink(public_path('fotoprofile/' . $data->foto));
        }

        $data->delete();
        return redirect()->route('ulasan')->with('delete','Delete Data Success');
    }
}
