<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\MUser;

use Session;
use Hash;

class AuthController extends Controller
{

    public function __construct() {
      $this->middleware('guest')->except('logout');
    }

    public function login()
    {
      return view('auth.login');
    }

    public function authenticate(Request $request)
    {
      if (Auth::attempt(['username' => $request->username, 'password' => $request->password], $request->get('remember'))) {

        $user = MUser::with('role')->where([
          'username' => $request->username,
        ])->first();

        $user = $user->toArray();
        $set = Session::put('user', $user);

        return response()->json(['status' => 202, 'msg' => 'Berhasil Login!', 'type' => 'success', 'title' => 'Berhasil!']);


      } else {
        return response()->json(['status' => 500, 'msg' => 'Username atau Password Salah!', 'type' => 'error', 'title' => 'Gagal!']);
      }
      
    }

    public function logout(Request $request) {
      $request->session()->flush();
      Auth::logout();
      
      return redirect('login');
    }
}