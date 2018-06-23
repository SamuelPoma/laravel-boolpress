<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;

class AdminController extends Controller
{
    public function adminView() {
      // alcuni dati che voglio passare alla view
      $data = [
        'admin' => 'Samuel Poma',
      ];
      $categories = Category::all();
      return view('admin.index', ['data'=>$data,'categories'=>$categories]);
    }

    public function addPost(Request $request) {
      $new_post = new Post();
      $new_post->title = $request->input('title');
      $new_post->author = $request->input('author');
      $new_post->slug = $request->input('slug');
      $new_post->content= $request->input('content');

      $new_post->save();
      $request->session()->flash('status',"new Post added!");
      return redirect()->route('admin');
  }

    public function viewEditPost($post_slug) {
      $posts = Post::where('slug',$post_slug)->get();

      $categories = Category::all();

      return view('admin.editPost', ['posts'=>$posts,'categories'=>$categories]);
    }

    public function updatePost(Request $request, $post_slug) {

      $update = Post::where('slug', $post_slug)->first();

      $update->title = $request->input('title');
      $update->author = $request->input('author');
      $update->slug = $request->input('slug');
      $update->content= $request->input('content');


      $update->save();


      $request->session()->flash('status',"Item updated!");

      return redirect()->route('admin');
    }
  }
