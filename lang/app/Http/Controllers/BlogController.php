<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BlogController extends Controller
{
   public function list(){
      $name    = 'Nurul Islam';
      $address = 'Kushtia';
      $phone   = 14718964568;

      $data = array();

    return view('blog.single', $data);
   }
}
