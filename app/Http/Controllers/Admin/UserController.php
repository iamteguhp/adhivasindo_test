<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\DataTables;

use Hash;

use App\Models\MUser;
use App\Models\MUserRole;

class UserController extends Controller
{
    /**
   * Display a listing of the resource.
   *
   * @return view
   */
  public function index()
  {
    $user_role = MUserRole::get();
    return view('ADMIN.user', compact('user_role'));
  }

  /**
   * Display the resource in datatables.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Yajra\DataTables\DataTables
   */
  public function dataTables(Request $request)
  {
      $user = MUser::with('role')->orderBy('id', 'desc')->get();
      return Datatables::of($user)->addIndexColumn()->make(true);
  }

  /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $data = $request->all();
        $check_duplicate_username = MUser::where('username', $data['username'])
        ->first();

        if (!empty($check_duplicate_username)) {
            if ($data['username'] == $check_duplicate_username->username) {
              return response()->json(['status' => 406, 'msg' => 'Maaf, username yang diinputkan sudah terdaftar', 'type' => 'warning']);
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
    }

    /**
     * Get the specified resource in storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function get_user(Request $request)
    {
        $user = '';
        if ($request->id != null || $request->id != '') {
            $user = MUser::where('id', $request->id)->first();
        }

        if ($user){
            return response()->json(['message' => 'Success getting data', 'data' => $user]);
        } else {
            return response()->json(['message' => 'Failed to get data', 'data' => $user]);
        }
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $id = $request->id;
        $data = $request->all();

        $user = MUser::find($id);
        if (!$user) {
            return response()->json(['status' => 404, 'msg' => 'Data user tidak ditemukan', 'type' => 'error']);
        }
        $check_duplicate_username = MUser::where('username', $data['username'])->first();

        /* Check duplicate User */
        if ($data['username'] != $user->username) {
            if (!empty($check_duplicate_username)) {
                if ($data['username'] == $check_duplicate_username->username) {
                    return response()->json(['status' => 406, 'msg' => 'Maaf, username akun yang diinputkan sudah terdaftar', 'type' => 'warning']);
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
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $data = $request->all();
        $destroy = MUser::find($data['id'])->delete();
        if ($destroy) {
            return response()->json(['status' => 202, 'msg' => 'Data berhasil dihapus.', 'type' => 'success']);
        } else {
            return response()->json(['status' => 500, 'msg' => 'Data gagal dihapus.', 'type' => 'error']);
        }
    }
  
}
