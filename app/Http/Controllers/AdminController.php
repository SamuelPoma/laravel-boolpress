<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function adminView() {
      // alcuni dati che voglio passare alla view
      $data = [
        'admin' => 'Samuel Poma',
      ];

      return view('admin.index', ['data'=>$data]);
    }
}
