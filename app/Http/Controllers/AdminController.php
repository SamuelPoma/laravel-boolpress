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
      return view('admin.index', ['data'=>$data]);
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
}
