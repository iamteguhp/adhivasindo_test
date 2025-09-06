<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Models\MUser;
use Illuminate\Support\Arr;

use Session;
use Hash;

class APIAuthController extends Controller
{

    public function login(Request $request)
    {
        try {
            // Validasi input
            $validate = Validator::make($request->all(), [
                'username' => 'required',
                'password' => 'required',
            ]);

            if ($validate->fails()) {
                return response()->json([
                    'status' => 422,
                    'msg'    => 'Username dan Password wajib diisi!',
                    'type'   => 'error'
                ], 422);
            }

            // Cek login
            if (!Auth::attempt([
                'username' => $request->username,
                'password' => $request->password
            ])) {
                return response()->json([
                    'status' => 401,
                    'msg'    => 'Username atau Password salah!',
                    'type'   => 'error'
                ], 401);
            }

            // Ambil user
            $user = MUser::with('role')
                ->where('username', $request->username)
                ->first();

            // Generate Sanctum Token
            $token = $user->createToken('api-token')->plainTextToken;

            return response()->json([
                'status'  => 200,
                'msg'     => 'Berhasil Login!',
                'type'    => 'success',
                'title'   => 'Berhasil!',
                'user'    => $user,
                'token'   => $token
            ]);

        } catch (\Throwable $th) {
            return response()->json([
                'status' => 500,
                'msg'    => 'Terjadi kesalahan server!',
                'type'   => 'error',
                'error'  => $th->getMessage()
            ], 500);
        }
    }

    public function logout(Request $request)
    {
        $request->user()->tokens()->delete();
        $respon = [
            'status' => 'success',
            'message' => 'Logout successfully',
            'errors' => null,
            'content' => null,
        ];
        return response()->json($respon, 200);
    }
}
