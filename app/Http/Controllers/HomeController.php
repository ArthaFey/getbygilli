<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Category;
use App\Models\Tiket;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home(){
        $category = Category::orderByDesc('created_at')->get();
        $tiket =  Tiket::orderByDesc('created_at')->paginate(12);
        $berita =  Berita::orderByDesc('created_at')->paginate(3);
        return view('frontend.index',compact('category','tiket','berita'));
    }

    public function category_all($slug){
        $category = Category::where('slug',$slug)->first();
        $tiket = $category->tiket()->with(['fototransportasi','deskripsitiket'])->orderByDesc('created_at')->paginate(20);
        return view('frontend.category-tiket-all.book-info',compact('category','tiket'));
    }

    public function detail_berita($id){
        $berita = Berita::findOrFail($id);
        $news = Berita::orderByDesc('created_at')->paginate(5);
        return view('frontend.berita.blog',compact('berita','news'));
    }
}
