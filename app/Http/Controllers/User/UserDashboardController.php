<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Admin\BarangModel;
use Illuminate\Support\Facades\Redirect;

class UserDashboardController extends Controller
{
    public function __construct()
    {
        $this->BarangModel = new BarangModel();
    }

    public function index()
    {

        $data = [
            'barang' => $this->BarangModel->allData(),
        ];
        return view('user.v_dashboard', $data);
    }
    //link about
    public function produk()
    {

        $data = [
            'barang' => $this->BarangModel->allData(),
        ];
        return view('user.v_produk', $data);
    }
    //link kontak
    public function kontak()
    {

        return view('user.v_kontak');
    }

    //link about
    public function about()
    {

        return view('user.v_about');
    }

    //link detail
    public function detail($id_brg)
    {
        if (!$this->BarangModel->detailData($id_brg)) {
            abort(404);
        }
        $data = [
            'barang' => $this->BarangModel->detailData($id_brg),
        ];
        return view('user.v_detailbarang', $data);
    }

    //halaman keranjang
    public function keranjang()
    {

        return view('user.v_keranjang');
    }

    //halaman tambah keranjang
    public function tambah_keranjang($id_brg)
    {
        session()->push('tambah_keranjang', [
            'id_brg' => $id_brg,
        ]);
        return Redirect('keranjang');
    }

    //halaman pembayaran
    public function pembayaran()
    {
        return view('user.v_pembayaran');
    }
}
