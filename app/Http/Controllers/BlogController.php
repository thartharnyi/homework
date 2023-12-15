<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index(){

      $filters=request(['search','category','author']);
      //dd($filters['search'] ?? null);
        return view('blogs.index',[
           'blogs'=>Blog::with('category','author')
           ->filter($filters)
           ->latest()
           ->paginate(3)
           ->withQueryString(), 
        ]);
     }

     public function show(Blog $blog){
        
            return view('blogs.show',[
               'blog'=>$blog,
               'random'=>Blog::inRandomOrder()->take(3)->get()
            ]);
     }
}
