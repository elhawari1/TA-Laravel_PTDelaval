<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Admin\BarangModel;
use Illuminate\Support\Facades\DB;
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
        $barang = DB::table('tbl_barang')
            ->where('id_brg', $id_brg)
            ->first();
            // if (session('tambah_keranjang') != null) {
            //     $id_brg = count(session('tambah_keranjang')) + 1;
            // }else{
            session()->push('tambah_keranjang', [
                'id_brg' => $id_brg,
                'jumlah' => 1,
                'harga' => $barang->harga,
            ]);
        //     }

        // $id_brg++;
        return Redirect('keranjang');
    }

    //fungs hapus session keranjang keranjang
    public function hapus_keranjang()
    {
        session()->forget('tambah_keranjang');
        return redirect()->back();
    }

    //fungs tambah barang keranjang tombol plus
    public function tambah($id_brg)
    {
        $keranjang = session('tambah_keranjang');
        if ($keranjang == null) {
           $this->tambah_keranjang($id_brg);
        }else{
            $jml = count($keranjang);

            for ($idplus = 0; $idplus < $jml; $idplus++) {
                if ($keranjang[$idplus]['id_brg'] == $id_brg) {

                    $keranjang[$idplus]['jumlah'] += 1;
                    session(['tambah_keranjang' => $keranjang]);
                }
            }
        }

        error_reporting();
        return redirect()->back();
    }

    //fungs kurang barang keranjang tombol plus
    public function kurang($id_brg)
    {
        $keranjang = session('tambah_keranjang');
        $jml = count($keranjang);

        error_reporting();
        for ($idplus = 0; $idplus < $jml; $idplus++) {
            if ($keranjang[$idplus]['id_brg'] == $id_brg) {

                $keranjang[$idplus]['jumlah'] -= 1;
                session(['tambah_keranjang' => $keranjang]);
            }
        }
        return redirect()->back();
    }

    //halaman pembayaran
    public function pembayaran()
    {
        return view('user.v_pembayaran');
    }

    //halaman bayar
    public function bayar()
    {
        return view('user.v_bayar');
    }
}
