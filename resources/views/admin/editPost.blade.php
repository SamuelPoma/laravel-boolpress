@extends('layouts.app')
@section('blog-content')
  <div class="admin_cnt">
    @foreach ($posts as $post)
      <h1>Admin Panel:</h1>
       <h3 class="blueText font-weight-bold">Update your Post: {{$post['title']}}</h3>
      {{-- <h3 class="font-weight-bold">Add new Post</h3> --}}
      <form class="" action="{{route('update_post', ['post_slug'=>$post['slug']])}}" method="post">
        {{ csrf_field() }}
        <div class="">
          <input type="text" name="title" value="{{$post['title']}}" placeholder="Title">
          <input type="text" name="author" value="{{$post['author']}}" placeholder="Author">
        </div>
        <div class="mt-3">
          <input type="text" name="slug" value="{{$post['slug']}}" placeholder="Slug">
        </div>
        <div class="mt-3">
          <textarea name="content" rows="8" cols="80" placeholder="Post Content">{{$post['content']}}</textarea>
        </div>
        <div class="">
          @foreach ($categories as $category)
            <label class="checkbox-inline"><input type="checkbox" value=""> {{$category['category_name']}}</label>
          @endforeach
        </div>
        <div class="pt-3 pb-3">
          <input type="submit" value="Update Post">
        </div>
      </form>
    @endforeach
  </div>

@endsection
