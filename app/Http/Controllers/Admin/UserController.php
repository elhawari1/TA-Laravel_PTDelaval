<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\UserModel;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function __construct()
    {
        $this->UserModel = new UserModel();
    }

    //tampil data
    public function index()
    {
        if (Auth::user()->role == 2) {
            $data = [
                'barang' => $this->UserModel->allData(),
            ];
            return view('user.v_dashboard', $data);
        } else {
            $data = [
                'barang' => $this->UserModel->allData(),

            ];
            return view('admin_delaval.user.v_index', $data);
        }
    }

    //link tambah data
    public function add()
    {
        if (Auth::user()->role == 2) {
            $data = [
                'barang' => $this->UserModel->allData(),
            ];
            return view('user.v_dashboard', $data);
        } else {
            return view('admin_delaval.user.v_add');
        }
    }

    //validasi dan add
    public function insert()
    {

        Request()->validate([
            'nama' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'role' => 'required',
        ], [
            'nama.required' => 'wajib diisi',
            'email.required' => 'wajib diisi',
            'role.required' => 'wajib diisi',
            'password.required' => 'wajib diisi',
        ]);

        $data = [
            'name' => Request()->nama,
            'email' => Request()->email,
            'role' => Request()->role,
            'password' => bcrypt(Request()->password),
        ];

        $this->UserModel->addData($data);
        return redirect()->route('user')->with('pesan', 'Data Berhasil Di Tambahkan');
    }

    public function edit($id)
    {
        if (Auth::user()->role == 2) {
            $data = [
                'barang' => $this->UserModel->allData(),
            ];
            return view('user.v_dashboard', $data);
        }
        if (!$this->UserModel->detailData($id)) {
            abort(404);
        } else {
            $data = [
                'barang' => $this->UserModel->detailData($id),
            ];
            return view('admin_delaval.user.v_edit', $data);
        }
    }

    //validasi update
    public function update($id)
    {

      Request()->validate([
        'nama' => 'required',
        'email' => 'required|email|unique:users',
        'role' => 'required',
    ], [
        'nama.required' => 'wajib diisi',
        'email.required' => 'wajib diisi',
        'role.required' => 'wajib diisi',
    ]);
        //jika validasi tidak ada maka simpan data
        if (Request()->password <> "") {

            $data = [
              'name' => Request()->nama,
              'email' => Request()->email,
              'role' => Request()->role,
              'password' => bcrypt(Request()->password),
            ];
            $this->UserModel->editData($id, $data);
        } else {
            $data = [
              'name' => Request()->nama,
              'email' => Request()->email,
              'role' => Request()->role,
            ];
            $this->UserModel->editData($id, $data);
        }
        return redirect()->route('user')->with('pesan', 'Data Berhasil Diubah');
    }

    public function delete($id_brg)
    {
        $this->UserModel->deleteData($id_brg);
        return redirect()->route('user')->with('pesan', 'Data Berhasil Dihapus');
    }
}
