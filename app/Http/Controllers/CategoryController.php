<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;


class CategoryController extends Controller
{
    public function viewPostForCategory($category_name) {
      $categories = Category::where('category_name',$category_name)->get();

      foreach ($categories as $category) {
        $category_name = $category['category_name'];
      }

      $posts = Post::all();

      return view('category.index',['category_name'=>$category_name, 'posts'=> $posts]);
    }

}
