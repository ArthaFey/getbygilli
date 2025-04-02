<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function category(){
        $category = Category::orderBy('created_at','desc')->paginate(10);
        return view('backend.category.index',compact('category'));
    }

    public function tambah(){
        return view('backend.category.tambah');
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
        return view('backend.category.edit',compact('category'));
    }

    public function update(Request $request,$id){
        $category = Category::findOrFail($id);
        $data = $request->all();
        $category->update($data);
        return redirect()->route('category')->with('update','Update Data Success');
    }

    public function delete($id){
        $category = Category::findOrFail($id);
        $category->delete();
        return redirect()->route('category')->with('delete','Delete Data Success');
    }

    public function checkSlug(Request $request){
        $slug = SlugService::createSlug(Category::class, 'slug', $request->category);
        return response()->json(['slug' => $slug]);
      }
}
