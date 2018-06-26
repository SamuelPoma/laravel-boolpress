<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;
class SearchController extends Controller
{
    public function searchPost(Request $request) {
      $posts = Post::all();
      $categories = Category::all();

      $data = $request->all();
      // se data non è vuoto esegui le seguenti istruzioni
      if (!empty($data)) {
        $posts = new Post;
        // code...
          // METODO PHP PLAIN----
          // C'è un'alternativa? Sì, nel model si possono creare degli scope che contengono la query, perché utilizzare gli scope?Se abbiamo la stessa query da dover ripetere più volte nel nostro codice allora così la scriveremo una volta sola e basterà richiamarla con il metodo scope che abbiamo creato
          if(!empty($data['title'])) {
            $posts = $posts->where('title', 'like', '%' . $data['title'] . '%');
          }

          if(!empty($data['content'])) {
            $posts = $posts->where('content','like', '%' . $data['content'] . '%');
          }

          if(!empty($data['author'])) {
            // chiamo il metodo creato nel model Post e passo la variabile
            $posts = $posts->author($data['author']);
          }
          // come collegare il filtro che è referenziato con una tabella ponte
          // many to many
          if(!empty($data['categories'])) {
            // si chiama il metodo categories di post
            $posts = $posts->whereHas('categories', function($query) use ($data) {
              return $query->where('id', $data['categories']);
            });
          }
          $posts = $posts->get();
      }
      // se data è vuoto l'array posts è vuoto e dunque non verrà visualizzato nella view alcun post, solo quando verranno impostati i filtri e submittati allora appariranno i posts relativi ai filtri selezionati
      else {
        $posts=[];
      }

      return view('search.index',['posts'=>$posts,'categories'=>$categories]);
    }


}
