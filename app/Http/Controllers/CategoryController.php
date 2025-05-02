<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Payment;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function category(Request $request){
        $search = $request->search;
        $category = Category::orderBy('created_at','desc')
                            ->where('name','like','%' . $search . '%')                    
                            ->paginate(10);
           $unread = Payment::where('is_read', false)
                     ->where('status', 'success')
                     ->count();
        return view('backend.category.index',compact('category','unread'));
    }

    public function tambah(){
           $unread = Payment::where('is_read', false)
                     ->where('status', 'success')
                     ->count();
        return view('backend.category.tambah',compact('unread'));
    }

    public function insert(Request $request){
        $category = Category::create($request->all());

          // Jika ada file gambar
        if($request->hasFile('foto')){
            // Simpan file ke folder 'file/'
            $fileName = $request->file('foto')->getClientOriginalName();
            $request->file('foto')->move('foto/', $fileName);

            // Simpan nama file ke kolom gambar di database
            $category->foto = $fileName;
        }

        $category->save();

        return redirect()->route('category')->with('insert','Add Data Success');
    }

    public function edit($id){
        $category = Category::findOrFail($id);
           $unread = Payment::where('is_read', false)
                     ->where('status', 'success')
                     ->count();
        return view('backend.category.edit',compact('category','unread'));
    }

    public function update(Request $request,$id){
        $category = Category::findOrFail($id);
        $data = $request->all();

        if ($request->hasFile('foto')) {
            // Hapus file lama jika ada
            if ($category->foto) {
                $oldFilePath = public_path('foto/' . $category->foto);
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
        $category->update($data);

        return redirect()->route('category')->with('update','Update Data Success');
    }

    public function delete($id){
        $category = Category::findOrFail($id);
        $category->delete();
        return redirect()->route('category')->with('delete','Delete Data Success');
    }

    public function checkSlug(Request $request)
    {
        $judulTiket = $request->input('name');  // Ambil nilai dari query parameter 'judul_tiket'
        $slug = Str::slug($judulTiket);  // Membuat slug dari judul tiket
    
        // Periksa jika slug sudah ada di database
        $originalSlug = $slug;
        $counter = 1;
        while (Category::where('slug', $slug)->exists()) {
            $slug = $originalSlug . '-' . $counter;  // Tambahkan angka pada slug jika sudah ada
            $counter++;  // Mengubah category menjadi slug
        }
        return response()->json(['slug' => $slug]);  // Kembalikan slug dalam format JSON
    }
}
