<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home(){
        $category = Category::orderByDesc('created_at')->get();
        return view('frontend.index',compact('category'));
    }
}
