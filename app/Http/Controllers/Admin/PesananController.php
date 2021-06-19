<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\BarangModel;
use App\Models\User\PesananModel;
use Illuminate\Support\Facades\Auth;


class PesananController extends Controller
{
    public function __construct()
    {
        $this->PesananModel = new PesananModel();
        $this->BarangModel = new BarangModel();
    }

    public function index()
    {
        if (Auth::user()->role == 2) {
            $data = [
                'barang' => $this->BarangModel->allData(),
            ];
            return view('user.v_dashboard', $data);
        } else {
            $data = [
                // 'barang' => $this->BarangModel->allData(),
                'pesanan' => $this->PesananModel->allData(),
            ];
            return view('admin_delaval.v_pesanan', $data);
        }
    }

    public function detail($id_pesanan)
    {
        if (Auth::user()->role == 2) {
            $data = [
                'barang' => $this->BarangModel->allData(),
            ];
            return view('user.v_dashboard', $data);
        } else if (!$this->PesananModel->detailData($id_pesanan)) {
            abort(404);
        } else {
            $data = [
                // 'barang' => $this->BarangModel->allData(),
                'pesanan' => $this->PesananModel->detailData($id_pesanan),
            ];
            return view('admin_delaval.v_detailpesanan', $data);
        }
    }

    public function terima($id)
    {
         $w = array('id_pesanan' => $id,);
         $data = array('status' => 1, );
         $this->PesananModel->editData($w, $data);
         return redirect()->route('pesanan');
    }

    public function tolak($id)
    {
        $w = array('id_pesanan' => $id,);
        $data = array('status' => 2,);
        $this->PesananModel->editData($w, $data);
        return redirect()->route('pesanan');
    }
}
