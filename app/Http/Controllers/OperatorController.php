<?php

namespace App\Http\Controllers;

use App\Models\Operator;
use App\Models\Payment;
use HTMLPurifier;
use HTMLPurifier_Config;
use Illuminate\Http\Request;

class OperatorController extends Controller
{
    public function operator(Request $request){
          $unread = Payment::where('is_read', false)
                     ->where('status', 'success')
                     ->count();
        $search = $request->search;
        $data = Operator::orderByDesc('created_at')
                        ->where('title','like' , '%' . $search . '%')
                        ->paginate(10);
        return view('backend.speedboatoperator.dataoperator', compact('data','unread'));
    }
    public function tambahopt(){
        $unread = Payment::where('is_read', false)
                    ->where('status', 'success')
                    ->count();
       return view('backend.speedboatoperator.tambahoperator',compact('unread'));
   }
   public function insertopt(Request $request){
    
    $content = $request->input('content');
    $config = HTMLPurifier_Config::createDefault();
    $purifier = new HTMLPurifier($config);
    $clean_content = $purifier->purify($content);

    $data = new Operator();
    $data->title = $request->input('title');
    $data->quantity = $request->input('quantity');
    $data->knocks = $request->input('knocks');
    $data->rating = $request->input('rating');
    $data->content = $clean_content; 
    $data->map1 = $request->input('map1');
    $data->map2 = $request->input('map2');
    
    try {
        $validated = $request->validate([
            'gambar' => 'required|image|max:2048',
            // ... validasi lain
        ]);
    
        $data = new Operator();
        // Isi data lainnya...
    
        // Handle upload
        if ($request->hasFile('gambar')) {
            $path = $request->file('gambar')->store('public/fotooperator');
            $data->gambar = basename($path);
        } else {
            throw new \Exception('File gambar tidak ditemukan');
        }
    
        if ($data->save()) {
            return redirect()->route('insertopt')->with('success', 'Data tersimpan');
        }
    } catch (\Exception $e) {
        return back()->with('error', 'Gagal menyimpan: '.$e->getMessage());
    }
    // Redirect ke halaman berita dengan pesan sukses
    return redirect()->route('backend.speedboatoperator.dataoperator')->with('insert', 'Add Data Success');
}
}
