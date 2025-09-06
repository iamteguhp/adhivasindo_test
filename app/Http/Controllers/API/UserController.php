<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Models\MUser;
use Illuminate\Support\Arr;

class UserController extends Controller
{

    public function getAll(Request $request)
    {
        try {
            $user = MUser::all();
            return response()->json(['status' => 200, 'msg' => 'Success!', 'type' => 'success', 'data' => $user], 200);
        } catch (\Throwable $th) {
            return response()->json(['status' => 500, 'msg' => 'Server Error!', 'type' => 'error'], 500);
        }
    }

    public function getUser(Request $request)
    {
        try {
            $user = MUser::where('id', $request->id)->first();
            if ($user) {
                return response()->json(['status' => 200, 'msg' => 'Success!', 'type' => 'success', 'data' => $user], 200);
            } else {
                return response()->json(['status' => 500, 'msg' => 'No user data!', 'type' => 'failed', 'data' => $user], 200);
            }
            
        } catch (\Throwable $th) {
            return response()->json(['status' => 500, 'msg' => 'Server Error!', 'type' => 'error'], 500);
        }
    }


    public function createUser(Request $request)
    {
        try {
            $data = $request->all();
            $check_duplicate_username = MUser::where('username', $data['username'])
            ->first();

            if (!empty($check_duplicate_username)) {
                if ($data['username'] == $check_duplicate_username->username) {
                return response()->json(['status' => 406, 'msg' => 'Maaf, username yang diinputkan sudah terdaftar', 'type' => 'warning']);
                }
            }

            $check_duplicate_email = MUser::where('email', $data['email'])
            ->first();

            if (!empty($check_duplicate_email)) {
                if ($data['email'] == $check_duplicate_email->email) {
                return response()->json(['status' => 406, 'msg' => 'Maaf, email yang diinputkan sudah terdaftar', 'type' => 'warning']);
                }
            }

            if ($data['password'] == null || $data['password'] == '') {
                return response()->json(['status' => 406, 'msg' => 'Password tidak boleh kosong', 'type' => 'warning']);
            }

            $data['password'] = Hash::make($request->get('password'));

            $user = MUser::create($data);
            if ($user) {
                return response()->json(['status' => 202, 'msg' => 'Data berhasil disimpan!', 'title' => 'Berhasil!', 'type' => 'success', 'data' => $user]);
            } else {
                return response()->json(['status' => 500, 'msg' => 'Data gagal disimpan!', 'title' => 'Gagal!', 'type' => 'error']);
            }
            
        } catch (\Throwable $th) {
            return response()->json(['status' => 500, 'msg' => 'Server Error!', 'type' => 'error'], 500);
        }
    }


    public function updateUser(Request $request)
    {
        try {
            $id = $request->id;
            $data = $request->all();

            $user = MUser::find($id);
            if (!$user) {
                return response()->json(['status' => 404, 'msg' => 'Data user tidak ditemukan', 'type' => 'error']);
            }

            $check_duplicate_username = MUser::where('username', $data['username'])->first();
            /* Check duplicate username */
            if ($data['username'] != $user->username) {
                if (!empty($check_duplicate_username)) {
                    if ($data['username'] == $check_duplicate_username->username) {
                        return response()->json(['status' => 406, 'msg' => 'Maaf, username akun yang diinputkan sudah terdaftar', 'type' => 'warning']);
                    }
                }
            }

            $check_duplicate_email = MUser::where('email', $data['email'])->first();
            /* Check duplicate email */
            if ($data['email'] != $user->email) {
                if (!empty($check_duplicate_email)) {
                    if ($data['email'] == $check_duplicate_email->email) {
                        return response()->json(['status' => 406, 'msg' => 'Maaf, email akun yang diinputkan sudah terdaftar', 'type' => 'warning']);
                    }
                }
            }

            $user->roles_id = $data['roles_id'];
            $user->name = $data['name'];
            $user->username = $data['username'];
            $user->email = $data['email'];
            if ($data['password'] != null || $data['password'] != '') {
                $user->password = Hash::make($data['password']);
            }

            $user->update();
            if ($user) {
                return response()->json(['status' => 202, 'msg' => 'Data berhasil disimpan!', 'title' => 'Berhasil!', 'type' => 'success', 'data' => $user]);
            } else {
                return response()->json(['status' => 500, 'msg' => 'Data gagal disimpan!', 'title' => 'Gagal!', 'type' => 'error']);
            }
            
        } catch (\Throwable $th) {
            return response()->json(['status' => 500, 'msg' => 'Server Error!', 'type' => 'error'], 500);
        }
    }




    public function deleteUser(Request $request)
    {
        try {
            $data = $request->all();
            $destroy = MUser::find($data['id'])->delete();
            if ($destroy) {
                return response()->json(['status' => 202, 'msg' => 'Data berhasil dihapus.', 'type' => 'success']);
            } else {
                return response()->json(['status' => 500, 'msg' => 'Data gagal dihapus.', 'type' => 'error']);
            }
        } catch (\Throwable $th) {
            return response()->json(['status' => 500, 'msg' => 'Server Error!', 'type' => 'error'], 500);
        }
    }



}
