<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin\BarangModel;


class PembelianController extends Controller
{
    public function __construct()
    {
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
        return view('admin_delaval.v_pembelian');
        }
    }
}
