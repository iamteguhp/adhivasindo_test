<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Session;

class HomepageController extends Controller
{
  public function index()
  {
    $user = Session::get('user');

    if ($user['email_verfiication_status'] == true) {
      $user['status'] = 'Verified';
    } else {
      $user['status'] = 'Not Verified';
    }
    return view('ADMIN.homepage', compact('user'));
  }
  
}
