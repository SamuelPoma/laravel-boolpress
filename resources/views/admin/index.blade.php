@extends('layouts.app')
@section('blog-content')
  <div class="admin_cnt">
    <h1>Admin Panel: <span class="blueText">{{$data['admin']}}</span></h1>
    <h3 class="font-weight-bold">Add new Post</h3>
    <form class="" action="{{route('add_post')}}" method="post">
      {{ csrf_field() }}
      <div class="">
        <input type="text" name="title" value="" placeholder="Title">
        <input type="text" name="author" value="" placeholder="Author">
      </div>
      <div class="mt-3">
        <input type="text" name="slug" value="" placeholder="Slug">
      </div>
      <div class="mt-3">
        <textarea name="content" rows="8" cols="80" placeholder="Post Content">
        </textarea>
      </div>
      <div class="">
        @foreach ($categories as $category)
          <label class="checkbox-inline">
            <input type="checkbox" name="category[]" multiple value="{{$category['id']}}"> {{$category['category_name']}}
          </label>
        @endforeach
      </div>
      <div class="pt-3 pb-3">
        <input type="submit" value="Add Post">
      </div>
    </form>
  </div>

@endsection
