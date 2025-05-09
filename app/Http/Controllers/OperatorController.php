<?php

namespace App\Http\Controllers;

use App\Models\Operator;
use App\Models\Payment;
use HTMLPurifier;
use HTMLPurifier_Config;
use Illuminate\Http\Request;

class OperatorController extends Controller
{
    public function operator(Request $request)
{
    $unread = Payment::where('is_read', false)
                 ->where('status', 'success')
                 ->count();

    $query = Operator::orderByDesc('created_at');

    if ($request->filled('search')) {
        $query->where('title', 'like', '%' . $request->search . '%');
    }

    $data = $query->paginate(5);

    return view('backend.speedboatoperator.dataoperator', compact('data','unread'));
}

    public function tambahopt(){
        $unread = Payment::where('is_read', false)
                    ->where('status', 'success')
                    ->count();
       return view('backend.speedboatoperator.tambahoperator',compact('unread'));
   }
   public function insertopt(Request $request)
{
    // Validasi awal
    $validated = $request->validate([
        'title' => 'required|string|max:255',
        'quantity' => 'required|integer',
        'knocks' => 'required|integer',
        'rating' => 'required|numeric',
        'content' => 'required|string',
        'map1' => 'nullable|string',
        'map2' => 'nullable|string',
        'gambar' => 'required|image|max:2048',
    ]);

    // Bersihkan konten HTML
    $config = \HTMLPurifier_Config::createDefault();
    $purifier = new \HTMLPurifier($config);
    $clean_content = $purifier->purify($request->input('content'));

    // Inisialisasi dan isi data
    $data = new Operator();
    $data->title = $request->input('title');
    $data->quantity = $request->input('quantity');
    $data->knocks = $request->input('knocks');
    $data->rating = $request->input('rating');
    $data->content = $clean_content;
    $data->map1 = $request->input('map1');
    $data->map2 = $request->input('map2');

    // Proses upload gambar jika ada
    if ($request->hasFile('gambar')) {
        // Pastikan folder tujuan sudah ada (gunakan public_path untuk keamanan)
        $imageName = $request->file('gambar')->getClientOriginalName();
        $request->file('gambar')->move(public_path('fotooperator'), $imageName);

        // Simpan nama gambar ke database
        $data->gambar = $imageName;
    }
    $data->save();  // Simpan data setelah nama gambar ditambahkan
    
    // Redirect ke halaman berita dengan pesan sukses
    return redirect()->route('operator')->with('Success', 'Data berhasil ditambahkan!');
}
public function store(Request $request)
{
    $validated = $request->validate([
        'title' => 'required',
        'gambar' => 'image|mimes:jpeg,png,jpg|max:2048',
        // validasi lainnya
    ]);

    if ($request->hasFile('gambar')) {
        $path = $request->file('gambar')->store('fotooperator', 'public');
        $validated['gambar'] = $path;
    }

    Operator::create($validated);
    // redirect dll
}
public function tampilkanopt($id){
    $unread = Payment::where('is_read', false)
                     ->where('status', 'success')
                     ->count();
        $data = Operator::find($id);
        return view('backend.speedboatoperator.editoperator', compact('data','unread'));
    }
    public function updateopt(Request $request, $id){
        // Ambil data berita yang ingin diperbarui
        $data = Operator::find($id);
    
        // Jika data tidak ditemukan, redirect dengan pesan error
        if (!$data) {
            return redirect()->route('operator')->with('error', 'Data not found!');
        }
    
        // Memurnikan konten (jika ada HTML)
        $content = $request->input('content');
        $config = HTMLPurifier_Config::createDefault();
        $purifier = new HTMLPurifier($config);
        $clean_content = $purifier->purify($content);
    
        // Perbarui data selain konten dan gambar, pastikan untuk tidak memperbarui kolom 'id' dan 'image' secara langsung
        $data->update([
            'title' => $request->input('title'),
            'quantity' => $request->input('quantity'),
            'knocks' => $request->input('knocks'),
            'rating' => $request->input('rating'),
            'content' => $clean_content,
            'map1' => $request->input('map1'),
            'map2' => $request->input('map2'),
        ]);
    
        // Proses upload gambar jika ada
    if ($request->hasFile('gambar')) {
        // Hapus gambar lama (jika ada) sebelum menyimpan gambar baru
        if ($data->gambar && file_exists(public_path('fotooperator/' . $data->gambar))) {
            unlink(public_path('fotooperator/' . $data->gambar));
        }

        // Simpan gambar baru
        $imageName = $request->file('gambar')->getClientOriginalName();
        $request->file('gambar')->move(public_path('fotooperator'), $imageName);

        // Update nama gambar di database
        $data->gambar= $imageName;
        $data->save();  // Jangan lupa simpan setelah gambar diperbarui
    }

    // Redirect setelah berhasil memperbarui
    return redirect()->route('operator')->with('update', 'Data Berhasil Diedit');
}
    public function deleteopt($id){

        $data = Operator::find($id);
        $data->delete();
        return redirect()->route('operator')->with('delete','Delete Data Success');

    }

}
