<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;
class SearchController extends Controller
{
    public function searchPost(Request $request) {
      $posts = Post::all();
      $categories = Category::all();

      $data = $request->all();

      // dd($data['categories']);
      $posts = new Post;

      if(!empty($data['title'])) {
        $posts = $posts->where('title', 'like', '%' . $data['title'] . '%');
      }

      if(!empty($data['content'])) {
        $posts = $posts->where('content','like', '%' . $data['content'] . '%');
      }

      if(!empty($data['author'])) {
        $posts = $posts->where('author',$data['author']);
      }
      if(!empty($data['categories'])) {
      
      }



      $posts = $posts->get();

      return view('search.index',['posts'=>$posts,'categories'=>$categories]);
    }


}
