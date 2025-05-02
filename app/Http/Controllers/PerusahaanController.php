<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\DeskripsiTiket;
use App\Models\FotoTransportasi;
use App\Models\Payment;
use App\Models\Perusahaan;
use App\Models\Tiket;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PerusahaanController extends Controller
{

    // ## PERUSAHAAN ## //
    public function perusahaan(Request $request){
        $search = $request->search;
        $perusahaan = Perusahaan::orderBy('created_at','desc')
                                ->where('nama', 'like', '%' . $search . '%')
                                ->paginate(10);
            $unread = Payment::where('is_read', false)
                     ->where('status', 'success')
                     ->count();
        return view('backend.perusahaan.index',compact('perusahaan','unread'));
    }
    public function tambah(){
           $unread = Payment::where('is_read', false)
                     ->where('status', 'success')
                     ->count();
        return view('backend.perusahaan.tambah',compact('unread'));
    }

    public function insert(Request $request){
        $perusahaan = Perusahaan::create($request->all());

          // Jika ada file gambar
           // Jika ada file gambar
           if($request->hasFile('logo')){
            // Simpan file ke folder 'file/'
            $fileName = $request->file('logo')->getClientOriginalName();
            $request->file('logo')->move('foto/', $fileName);

            // Simpan nama file ke kolom gambar di database
            $perusahaan->logo = $fileName;
        }

        $perusahaan->save();

        return redirect()->route('perusahaan')->with('insert','Add Data Success');
    }

    public function edit($id){
        $perusahaan = Perusahaan::findOrFail($id);
            $unread = Payment::where('is_read', false)
                     ->where('status', 'success')
                     ->count();
        return view('backend.perusahaan.edit',compact('perusahaan','unread'));
    }

    public function update(Request $request,$id){
        $perusahaan = Perusahaan::findOrFail($id);
        $data = $request->all();

        if ($request->hasFile('logo')) {
            // Hapus file lama jika ada
            if ($perusahaan->logo) {
                $oldFilePath = public_path('foto/' . $perusahaan->logo);
                if (file_exists($oldFilePath)) {
                    unlink($oldFilePath); // Menghapus file lama
                }
            }
    
            // Upload file baru
            $file = $request->file('logo');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move('foto/', $filename); // Memindahkan file ke folder yang benar
            $data['logo'] = $filename; // Menyimpan nama file baru ke dalam data
        }
        $perusahaan->update($data);

        return redirect()->route('perusahaan')->with('update','Update Data Success');
    }

    public function delete($id){
        $perusahaan = Perusahaan::findOrFail($id);
        $perusahaan->delete();
        return redirect()->route('perusahaan')->with('delete','Delete Data Success');
    }
    public function checkSlug(Request $request){
        $slug = SlugService::createSlug(Perusahaan::class, 'slug', $request->nama);
        return response()->json(['slug' => $slug]);
    }


    // ## TIKET ## //
    public function showTiket(Request $request,$id){
        $search = $request->search;
        $perusahaan = Perusahaan::findOrFail($id);
        $tiket = $perusahaan->tiket()->orderBy('created_at','desc')
        ->where('judul_tiket','like','%' . $search . '%')                            
        ->paginate(10);
    $unread = Payment::where('is_read', false)
                     ->where('status', 'success')
                     ->count();        return view('backend.perusahaan.tiket.index',compact('perusahaan','tiket','unread'));
    }

    public function tambahTiket($id){
        $perusahaan = Perusahaan::findOrFail($id);
        $category = Category::orderByDesc('created_at')->get();
           $unread = Payment::where('is_read', false)
                     ->where('status', 'success')
                     ->count();
        return view('backend.perusahaan.tiket.tambah',compact('perusahaan','category','unread'));
    }

    public function insertTiket(Request $request,$id){
        $perusahan = Perusahaan::findOrFail($id);
        $tiket = Tiket::create($request->all());
        if($request->hasFile('foto')){
            $fileName = $request->file('foto')->getClientOriginalName();
            $request->file('foto')->move('foto/', $fileName);
            $tiket->foto = $fileName;
            $tiket->save();
        }

        return redirect()->route('tiket.show',$id)->with('insert','Add Data Success');
    }

    public function editTiket($id){
        $tiket = Tiket::findOrFail($id);
        $category = Category::orderByDesc('created_at')->get();
            $unread = Payment::where('is_read', false)
                     ->where('status', 'success')
                     ->count();
        return view('backend.perusahaan.tiket.edit',compact('tiket','category','unread'));
    }

    public function updateTiket(Request $request, $id){
        $tiket = Tiket::findOrFail($id);
        $data = $request->all();
    
        // Memproses status switch (checkbox)
        $data['status'] = $request->has('status'); // Jika switch dicentang, status akan menjadi true, jika tidak false
    
        // Mengecek dan mengupload foto baru jika ada
        if ($request->hasFile('foto')) {
            // Hapus file lama jika ada
            if ($tiket->foto) {
                $oldFilePath = public_path('foto/' . $tiket->foto);
                if (file_exists($oldFilePath)) {
                    unlink($oldFilePath); // Menghapus file lama
                }
            }
    
            // Upload file baru
            $file = $request->file('foto');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move('foto/', $filename); // Memindahkan file ke folder yang benar
            $data['foto'] = $filename; // Menyimpan nama file baru ke dalam data
        }
    
        // Update data tiket dengan data baru
        $tiket->update($data);
    
        return redirect()->route('tiket.show', $tiket->perusahaan->id)->with('update', 'Update Data Success');
    }
    

    public function deleteTiket(Request $request,$id){
        $tiket = Tiket::findOrFail($id);
        $tiket->delete();
        return back()->with('delete','Delete Data Success');
    }

    public function slugCheck(Request $request)
    {
    $judulTiket = $request->input('judul_tiket');  // Ambil nilai dari query parameter 'judul_tiket'
    $slug = Str::slug($judulTiket);  // Membuat slug dari judul tiket

    // Periksa jika slug sudah ada di database
    $originalSlug = $slug;
    $counter = 1;
    while (Tiket::where('slug', $slug)->exists()) {
        $slug = $originalSlug . '-' . $counter;  // Tambahkan angka pada slug jika sudah ada
        $counter++;
    }

    return response()->json(['slug' => $slug]);  // Kembalikan slug yang unik
    }

    // ## FOTO TANSPORTASI ## //
    public function showfoto(Request $request,$id){
        $tiket = Tiket::findOrFail($id);
        $fotoTransportasi = $tiket->fototransportasi()->orderByDesc('created_at')
        ->paginate(10);
            $unread = Payment::where('is_read', false)
                     ->where('status', 'success')
                     ->count();
        return view('backend.perusahaan.tiket.foto-transportasi.index',compact('tiket','fotoTransportasi','unread'));
    }

    public function tambahfoto($id){
        $tiket = Tiket::findOrFail($id);
            $unread = Payment::where('is_read', false)
                     ->where('status', 'success')
                     ->count();
        return view('backend.perusahaan.tiket.foto-transportasi.tambah',compact('tiket','unread'));
    }

    public function insertfoto(Request $request,$id){
        $tiket = Tiket::findOrFail($id);
        $fotoTransporatsi = FotoTransportasi::create($request->all());
        if($request->hasFile('foto')){
            $filename = $request->file('foto')->getClientOriginalName();
            $request->file('foto')->move('foto/' , $filename);
            $fotoTransporatsi->foto = $filename; 
            $fotoTransporatsi->save(); 
        }
        return redirect()->route('foto.show',$tiket->id)->with('insert','Add Data Success');
    }

    public function editfoto($id){
            $unread = Payment::where('is_read', false)
                     ->where('status', 'success')
                     ->count();
        $fotoTransportasi = FotoTransportasi::findOrFail($id);
        return view('backend.perusahaan.tiket.foto-transportasi.edit',compact('fotoTransportasi','unread'));
    }

    public function updatefoto(Request $request,$id){
        $fotoTransportasi = FotoTransportasi::findOrFail($id);
        $data = $request->all();

        if ($request->hasFile('foto')) {
            // Hapus file lama jika ada
            if ($fotoTransportasi->foto) {
                $oldFilePath = public_path('foto/' . $fotoTransportasi->foto);
                if (file_exists($oldFilePath)) {
                    unlink($oldFilePath); // Menghapus file lama
                }
            }
 
            $file = $request->file('foto');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move('foto/', $filename); // Memindahkan file ke folder yang benar
            $data['foto'] = $filename; // Menyimpan nama file baru ke dalam data
        }
        $fotoTransportasi->update($data);

        return redirect()->route('foto.show',$fotoTransportasi->tiket->id)->with('update','Update Data Success');
    }
    public function deletefoto($id){
        $fotoTransportasi = FotoTransportasi::findOrFail($id);
        $fotoTransportasi->delete();
        return back()->with('delete','Delete Data Success');
    }

    // ## DESKRIPSI TIKET ## //
    public function showdeskripsi($id){
        $tiket = Tiket::findOrFail($id);
           $unread = Payment::where('is_read', false)
                     ->where('status', 'success')
                     ->count();
        $deskripsi = $tiket->deskripsitiket()->orderByDesc('created_at')->paginate(10);
        return view('backend.perusahaan.tiket.deskripsi-perjalanan.index',compact('tiket','deskripsi','unread'));
    }

    public function tambahdeskripsi($id){
            $unread = Payment::where('is_read', false)
                     ->where('status', 'success')
                     ->count();
        $tiket =  Tiket::findOrFail($id);
        return view('backend.perusahaan.tiket.deskripsi-perjalanan.tambah',compact('tiket','unread'));
    }

    public function insertdeskripsi(Request $request,$id){
        $tiket =  Tiket::findOrFail($id);
        $deskripsi = DeskripsiTiket::create($request->all());

        if($request->hasFile('icon')){
            $filename = $request->file('icon')->getClientOriginalName();
            $request->file('icon')->move('foto/', $filename);
            $deskripsi->icon = $filename;
            $deskripsi->save();
        }

        return redirect()->route('deskripsi.show',$tiket->id)->with('insert','Add Data Success');
    }

    public function editdeskripsi($id){
           $unread = Payment::where('is_read', false)
                     ->where('status', 'success')
                     ->count();
        $deskripsi = DeskripsiTiket::findOrFail($id);
        return view('backend.perusahaan.tiket.deskripsi-perjalanan.edit',compact('deskripsi','unread'));
    }

    public function updatedeskripsi(Request $request,$id){
        $deskripsi = DeskripsiTiket::findOrFail($id);
        $data = $request->all();

        if ($request->hasFile('icon')) {
            // Hapus file lama jika ada
            if ($deskripsi->icon) {
                $oldFilePath = public_path('foto/' . $deskripsi->icon);
                if (file_exists($oldFilePath)) {
                    unlink($oldFilePath); // Menghapus file lama
                }
            }
 
            $file = $request->file('icon');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move('foto/', $filename); // Memindahkan file ke folder yang benar
            $data['icon'] = $filename; // Menyimpan nama file baru ke dalam data
        }
        $deskripsi->update($data);

        return redirect()->route('deskripsi.show',$deskripsi->tiket->id)->with('update','Update Data Success');
    }

    public function deletedeskripsi($id){
        $deskripsi = DeskripsiTiket::findOrFail($id);
        $deskripsi->delete();
        return back()->with('delete','Delete  Data Success');
    }


}
