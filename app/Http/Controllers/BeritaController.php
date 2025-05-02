<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Payment;
use HTMLPurifier;
use HTMLPurifier_Config;
use Illuminate\Http\Request;

class BeritaController extends Controller
{
    public function news(Request $request){
          $unread = Payment::where('is_read', false)
                     ->where('status', 'success')
                     ->count();
        $search = $request->search;
        $data = Berita::orderByDesc('created_at')
                        ->where('title','like' , '%' . $search . '%')
                        ->paginate(10);
        return view('backend.berita.databerita', compact('data','unread'));
    }

    public function tambahdata(){
         $unread = Payment::where('is_read', false)
                     ->where('status', 'success')
                     ->count();
        return view('backend.berita.uploaddata',compact('unread'));
    }
    public function insertdata(Request $request){
    
        $content = $request->input('content');
        $config = HTMLPurifier_Config::createDefault();
        $purifier = new HTMLPurifier($config);
        $clean_content = $purifier->purify($content);

        $data = new Berita();
        $data->title = $request->input('title');
        $data->excerpt = $request->input('excerpt');
        $data->content = $clean_content; 
        $data->date = $request->input('date');
        $data->hit = $request->input('hit');
    
        // Proses upload gambar jika ada
        if ($request->hasFile('image')) {
            // Pastikan folder tujuan sudah ada (gunakan public_path untuk keamanan)
            $imageName = $request->file('image')->getClientOriginalName();
            $request->file('image')->move('fotoberita/', $imageName);
    
            // Simpan nama gambar ke database
            $data->image = $imageName;
        }
        $data->save();  // Simpan data setelah nama gambar ditambahkan
        
        // Redirect ke halaman berita dengan pesan sukses
        return redirect()->route('news')->with('insert', 'Add Data Success');
    }
    public function tampilkandata($id){
    $unread = Payment::where('is_read', false)
                     ->where('status', 'success')
                     ->count();
        $data = Berita::find($id);
        return view('backend.berita.editberita', compact('data','unread'));
    }
    public function updatedata(Request $request, $id){
        // Ambil data berita yang ingin diperbarui
        $data = Berita::find($id);
    
        // Jika data tidak ditemukan, redirect dengan pesan error
        if (!$data) {
            return redirect()->route('news')->with('error', 'Data not found!');
        }
    
        // Memurnikan konten (jika ada HTML)
        $content = $request->input('content');
        $config = HTMLPurifier_Config::createDefault();
        $purifier = new HTMLPurifier($config);
        $clean_content = $purifier->purify($content);
    
        // Perbarui data selain konten dan gambar, pastikan untuk tidak memperbarui kolom 'id' dan 'image' secara langsung
        $data->update([
            'title' => $request->input('title'),
            'excerpt' => $request->input('excerpt'), // Excerpt yang sudah dipurifikasi
            'content' => $clean_content,  // Content yang sudah dipurifikasi
            'date' => $request->input('date'),
            'hit' => $request->input('hit'),
        ]);
    
        // Proses upload gambar jika ada
        if ($request->hasFile('image')) {
            // Hapus gambar lama (jika ada) sebelum menyimpan gambar baru
            if ($data->image && file_exists(public_path('fotoberita/' . $data->image))) {
                unlink(public_path('fotoberita/' . $data->image));
            }
    
            // Simpan gambar baru
            $imageName = $request->file('image')->getClientOriginalName();
            $request->file('image')->move('fotoberita/', $imageName);
    
            // Update nama gambar di database
            $data->image = $imageName;
            $data->save();  // Jangan lupa simpan setelah gambar diperbarui
        }
    
        // Redirect setelah berhasil memperbarui
        return redirect()->route('news')->with('update', 'Update Data Success');
    }
    public function delete($id){

        $data = Berita::find($id);
        $data->delete();
        return redirect()->route('news')->with('delete','Delete Data Success');

    }
    
}
