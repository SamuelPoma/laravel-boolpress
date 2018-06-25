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
      $data = $request->all();


      $new_post = new Post();

      $new_post->fill($data);

      $new_post->save();
      $new_post->categories()->sync($data['category']);
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
