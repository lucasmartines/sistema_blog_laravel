<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    //
    public function home(){
      //  echo 'root';
        return view('backend.home');
    }
}
