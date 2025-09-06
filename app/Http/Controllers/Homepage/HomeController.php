<?php

namespace App\Http\Controllers\Homepage;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Phpfastcache\Helper\Psr16Adapter;


class HomeController extends Controller
{
  public function index()
  {
    return view('home');
  }
  
}
