@extends('layouts.app')
@section('blog-content')
<div>
  <h1 class="title-section">Articles</h1>
  @foreach ($posts as $post)
    <div class="post_cnt mt-5">
      <h3 class="title-post font-weight-bold">{{$post['title']}}</h3>
      <div class="info-post">
        <h5 class="item pr-3">{{$post['author']}}</h5>
        <small class="item">{{$post['created_at']}}</small>
      </div>
        <div class="info-post">
          <h5 class="font-weight-bold"><span>Category:</span>
          {{--devo rendere dinamica la chiave per prendere i valori   --}}
          {{$post->categories[0]['category_name']}}
          {{$post->categories[1]['category_name']}}
          </h5>
        </div>
        <div class="content-post">
          <p class="lead">{{$post['content']}}</p>
        </div>
    </div>
  @endforeach
</div>
@endsection
