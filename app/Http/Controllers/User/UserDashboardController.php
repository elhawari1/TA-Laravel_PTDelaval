<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Admin\BarangModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\User\PembelianModel;
use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\Redirect;

class UserDashboardController extends Controller
{
    public function __construct()
    {
        $this->BarangModel = new BarangModel();
        $this->PembelianModel = new PembelianModel();
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
            session()->push('tambah_keranjang', [
                'id_brg' => $id_brg,
                'jumlah' => 1,
                'harga' => $barang->harga,
            ]);
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

    public function insBayar()
    {

        $daynow = date('Y-m-d');
        $pesanan = [
            'id' => Auth::user()->id,
            'alamat' => Request()->alamat,
            'no_hp' => Request()->no_telpon,
            'kode_pos' => Request()->kode_pos,
            'total' => Request()->total,
            'tgl_pesan' => $daynow,
            'batas_bayar' => date('Y-m-d', strtotime('+1 day', strtotime($daynow))),
            'status' => 0,
        ];
        $this->PembelianModel->addData($pesanan);

        $bayar = $this->PembelianModel->lastIns();
        return redirect()->route('bayar',[$bayar->id_pesanan]);
    }
    //halaman bayar
    public function bayar($id)
    {
        $id_pesanan = $id;
        // return redirect()->route('barang')->with('pesan', 'Data Berhasil Di Tambahkan !!');
        return redirect()->route('barang', compact('id_pesanan'));
    }

    public function insBukti()
    {
        $file = Request()->bukti_tf;
        $fileName = date('d/m/Y H:i'). '.' . $file->extension();
        $file->move(public_path('foto/struk_pembayaran'), $fileName);

        $data = array('bukti_tf' => $fileName, );
        $w = array('id_pesanan' => Request()->id_pesanan, );
        $this->PembelianModel->editData($w, $data);
        return redirect()->route('pt_delaval');
    }
}
