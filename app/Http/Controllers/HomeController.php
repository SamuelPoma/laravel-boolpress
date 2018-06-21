<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    // funzione che ritorna la homepage
    public function homepage() {
      return view('home.index');
    }
}
