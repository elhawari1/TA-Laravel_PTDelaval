<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\BarangModel;
use App\Models\User\KomentarModel;
use App\Models\User\PesananModel;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->KomentarModel = new KomentarModel();
        $this->BarangModel = new BarangModel();
        $this->PesananModel = new PesananModel();
    }

    public function index()
    {
        if (Auth::user()->role == 2) {
            $data = [
            'barang' => $this->BarangModel->allDataUser(),
            ];
            return view('user.v_dashboard', $data);
        }else{
            $data = [
                'hapusPesananTenggat' => $this->PesananModel->cekPesananTenggat(),
                'barang' => $this->BarangModel->allData(),
                'komentar' => $this->BarangModel->allDataKomentar(),
                'users' => $this->KomentarModel->allPengguna(),
                'pesanan' => $this->PesananModel->allData(),
                'pesananBelumBayar' => $this->PesananModel->getPesananBelumBayar(),
                'pesanDiProses' => $this->PesananModel->getDiProses(),
            ];

            // var_dump($this->PesananModel->revokeStok());die;
            return view('admin_delaval.v_dashboard',$data);
        }
    }

    public function indexKomentar()
    {
        if (Auth::user()->role == 2) {
            $data = [
                'barang' => $this->BarangModel->allData(),
            ];
            return view('user.v_dashboard', $data);
        } else {
        $data = [
            'komentar' => $this->BarangModel->allDataKomentar(),
        ];
        return view('admin_delaval.v_komentaruser', $data);
        }
    }

    public function delete($id_komentar)
    {
        $this->KomentarModel->deleteData($id_komentar);
        return redirect()->route('komentar')->with('pesan', 'Data Berhasil Dihapus');
    }
}
