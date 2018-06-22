@extends('layouts.app')
@section('blog-content')
  <div>
    <h1 class="title-section">Articles for category: {{$category_name}} </h1>
  @foreach ($posts as $post)
    @foreach ($post->categories as $categoryPost)
          @if ($categoryPost['category_name'] == $category_name)
            <div class="post_cnt mt-5">
              <h3 class="title-post font-weight-bold">{{$post['title']}}</h3>
              <div class="info-post">
                <h5 class="item pr-3">{{$post['author']}}</h5>
                <small class="item">{{$post['created_at']}}</small>
              </div>
                <div class="info-post">
                  <h5 class="font-weight-bold"><span>Category:</span>
                      {{--risoluzione, post->categories, devo ciclare su di lui che è l'array  --}}
                    @foreach ($post->categories as $category)
                      {{$category['category_name']}}
                    @endforeach
                  {{--devo rendere dinamica la chiave per prendere i valori   --}}
                  {{-- {{$post->categories[1]['category_name']}} --}}
                  </h5>
                </div>
                <div class="content-post">
                  <p class="lead">{{$post['content']}}</p>
                </div>
            </div>
          </div>
          @endif
    @endforeach
  @endforeach
@endsection
