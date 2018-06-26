<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['title','author','slug','content'];

    public function categories() {
       return $this->belongsToMany('App\Category');
    }

    // SINTASSI PER le SCOPE FUNCTION: nome della funzione inizia sempre con la parola chiave scope seguita da altre parole in camel case, verrà richiamata nel controller la funzione senza la  parola chiave scope e partendo con la prima parola decisa da noi in minuscolo, le altre seguiranno il camel case.
                              // query parola chiave e $author è la variabile che passeremo nel controller
    public function scopeAuthor($query, $author) {
      return $query->where('author', $author);
    }
}
