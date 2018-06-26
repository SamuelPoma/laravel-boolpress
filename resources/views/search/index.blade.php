@extends('layouts.app')
@section('blog-content')
  <form class="" action="#" method="get">
    <div class="">
      <input type="text" name="title" value="" placeholder="Title">
    </div>
    <div class="mt-3">
      <textarea name="content" rows="8" cols="80" placeholder="Post Content"></textarea>
    </div>
      <select class="" name="categories">
          <option value="">---</option>
          @foreach ($categories as $category)

            <option value="{{$category['id']}}">{{$category['category_name']}}
            </option>
          @endforeach
      </select>
      {{--LOGICA PER POPOLARE LA SELECT SOLO CON VALORI UNIVOCI --}}
      {{--creo un array vuoto  --}}
      @php
      $authors= [];
      @endphp
      {{--ciclo su posts e se il valore $post['author'] non è contenuto nell'array
       allora lo pusho dentro l'array authors, altrimenti non accade nulla e il duplicato non viene pushato--}}
      @foreach ($posts as $post)
        @if (!in_array($post['author'],$authors))
          @php
          $authors[] = $post['author']
          @endphp
        @endif
      @endforeach
      <select name="author">
          <option value="">---</option>
          {{--CICLO SULL'ARRAY AUTHORS che ho popolato soltanto con valori univoci e prendo i valori  --}}
          @foreach ($authors as $author)
            <option value="{{$author}}">{{$author}}</option>
          @endforeach
      </select>
    <div class="pt-3 pb-3">
      <input type="submit" value="Filter Post">
    </div>
  </form>
  <table class="table">
  <thead>
    <tr>
      <th>Title</th>
      <th>Author</th>
      <th>Content</th>
      <th>Categories</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($posts as $post)
      <tr>
        <td>{{$post['title']}}</td>
        <td>{{$post['author']}}</td>
        <td>
          @php
           // visualizzo solo i primi 50 caratteri di una descrizione all'interno della tabella
           $descriptionShortText = substr($post['content'], 0, 50);
         @endphp
         {{$descriptionShortText . "[...]"}}
       </td>
      </tr>
    @endforeach
  </tbody>
</table>
@endsection
