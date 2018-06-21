<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;

class HomeController extends Controller
{
    // funzione che ritorna la homepage
    public function homepage() {
      // prendo i posti,li ordino in senso desc per data di creazione e ne visualizzo
      // massimo 5
      $posts = Post::orderBy('created_at', 'desc')->take(5)->get();
      $categories = Category::all();

      return view('home.index',['posts'=>$posts,'categories'=>$categories]);
    }
}
