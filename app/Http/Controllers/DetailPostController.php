<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;

class DetailPostController extends Controller
{
    public function viewPostForSlug($post_slug) {
      $posts = Post::where('slug', $post_slug)->get();

      return view('postDetail.index', ['posts' => $posts]);
    }
}
