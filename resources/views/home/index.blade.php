@extends('layouts.app')
@section('blog-content')
<div>
  <h1 class="title-section">Articles</h1>
  @foreach ($posts as $post)
    <div class="post_cnt mt-5">
      <h3 class="title-post font-weight-bold">{{$post['title']}}
        <a href="{{route('edit_post_page',['post_slug' => $post['slug']])}}">
          <i class="fas fa-pencil-alt ml-4 edit-icon blueText"></i>
        </a>
      </h3>

      <div class="info-post">
        <h5 class="item pr-3">{{$post['author']}}</h5>
        <small class="item">{{$post['created_at']}}</small>
      </div>
        <div class="info-post">
          @foreach ($post->categories as $category)
          <a href="{{route('posts_for_category', ['category_name' => $category['category_name']])}}">
            <h5 class="font-weight-bold"><span>Category:</span>
                {{--risoluzione, post->categories, devo ciclare su di lui che è l'array  --}}
                {{$category['category_name']}}
            {{--devo rendere dinamica la chiave per prendere i valori   --}}
            {{-- {{$post->categories[1]['category_name']}} --}}
            </h5>
          </a>
        @endforeach
        </div>
        <div class="content-post">
          <p class="lead">{{$post['content']}}</p>
        </div>
    </div>
  @endforeach
</div>
@endsection
