<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User\KomentarModel;

class KomentarController extends Controller
{
    public function __construct()
    {
        $this->KomentarModel = new KomentarModel();
    }

    //tambah data komentar
    public function add()
    {
        return view('user.v_kontak');
    }

    //validasi dan add komentar
    public function insert()
    {
        Request()->validate([
            'nama' => 'required',
            'email' => 'required',
            'telepon' => 'required',
            'pesan' => 'required',
        ], [
            'nama.required' => 'wajib diisi !!',
            'email.required' => 'wajib diisi !!',
            'telepon.required' => 'wajib diisi !!',
            'pesan.required' => 'wajib diisi !!',
        ]);
        $data = [
            'nama' => Request()->nama,
            'email' => Request()->email,
            'telepon' => Request()->telepon,
            'pesan' => Request()->pesan,
        ];

        $this->KomentarModel->addData($data);
        return redirect()->route('kontak')->with('pesan', 'Pesan Anda Berhasil Di Kirim !!');
    }
}
