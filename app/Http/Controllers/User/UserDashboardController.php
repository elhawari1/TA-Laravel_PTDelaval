<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Admin\BarangModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\User\PesananModel;
use GrahamCampbell\ResultType\Result;
use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\Redirect;

class UserDashboardController extends Controller
{
    public function __construct()
    {
        $this->BarangModel = new BarangModel();
        $this->PesananModel = new PesananModel();
    }

    public function index()
    {
        $data = [
            'barang' => $this->BarangModel->allDataUser(),
        ];

        return view('user.v_dashboard', $data);
    }
    //link about
    public function produk()
    {
        $data = [
            'barang' => $this->BarangModel->getPaginateData(),
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

    //llnk riwayat
    public function riwayat()
    {
        $data = [
            // 'barang' => $this->BarangModel->allData(),
            'pesanan' => $this->PesananModel->allData(),
        ];
        return view('user.v_riwayat', $data);
    }
    //link detail riwayat
    public function detail_riwayat($id_pesanan)
    {
        if (!$this->PesananModel->detailData($id_pesanan)) {
            abort(404);
        }
        $data = [
            'pesanan' => $this->PesananModel->detailData($id_pesanan),
        ];
        return view('user.v_detailriwayat', $data);
    }

    //link keranjang
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
        $data = session('tambah_keranjang');
        // dd($data);
        $jml = count((array)$data);
        $id_br_kr = 0;

        if ($data == null) {
            session()->push('tambah_keranjang', [
                'id_brg' => $id_brg,
                'jumlah' => 1,
                'harga' => $barang->harga,
            ]);
        } else {
            echo $jml;
            // dd($data);
            for ($idplus = 0; $idplus < $jml; $idplus++) {
                echo 'ada <br>';
                if ($data[$idplus]['id_brg'] == $id_brg) {
                    $id_br_kr = 0;
                    echo $data[$idplus]['id_brg'];
                    $data[$idplus]['jumlah'] += 1;
                    session(['tambah_keranjang' => $data]);
                    break;
                } else {
                    $id_br_kr = 1;
                }
            }
            if ($id_br_kr == 1) {
                session()->push('tambah_keranjang', [
                    'id_brg' => $id_brg,
                    'jumlah' => 1,
                    'harga' => $barang->harga,
                ]);
            }
        }
        return Redirect()->back();
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
        } else {
            $jml = count($keranjang);

            for ($idplus = 0; $idplus < $jml; $idplus++) {
                if ($keranjang[$idplus]['id_brg'] == $id_brg) {
                    $barang = DB::table('tbl_barang')->where('id_brg', '=', $keranjang[$idplus]['id_brg'])->get()->first();
                    $stok = $barang->stok;
                    if ($keranjang[$idplus]['jumlah'] < 10) {
                        $keranjang[$idplus]['jumlah'] += 1;
                        // dd(session('tambah_keranjang'));
                        session(['tambah_keranjang' => $keranjang]);
                    }
                }
            }
        }

        error_reporting();
        return redirect()->back();
    }

    //fungs kurang barang keranjang tombol minus
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

    //halaman insert pembayaran
    public function insertPemb()
    {
        $daynow = date('Y-m-d');
        $data = [
            'id' => Auth::user()->id,
            'koten' => Request()->koten,
            'kecamatan' => Request()->kecamatan,
            'kelurahan' => Request()->kelurahan,
            'alamat' => Request()->alamat,
            'no_hp' => Request()->no_telpon,
            'kode_pos' => Request()->kode_pos,
            'total' => Request()->total,
            'tgl_pesan' => $daynow,
            'batas_bayar' => date('Y-m-d', strtotime('+1 day', strtotime($daynow))),
            'status' => 0,
        ];
        $this->PesananModel->addData('tbl_pesanan', $data);
        $bayar = $this->PesananModel->lastIns();
        $keranjang = session('tambah_keranjang');
        $jml = count($keranjang);

        for ($i = 0; $i < $jml; $i++) {
            $subtotal = $keranjang[$i]['jumlah'] * $keranjang[$i]['harga'];
            $detail = array(
                'id_pesanan' => $bayar[0]->id_pesanan,
                'id_brg'  => $keranjang[$i]['id_brg'],
                'jumlah_brg'  => $keranjang[$i]['jumlah'],
                'subtotal'  => $subtotal,
            );
            $barang = DB::table('tbl_barang')->where('id_brg', '=', $keranjang[$i]['id_brg'])->get();
            $stok = $barang[0]->stok -  $keranjang[$i]['jumlah'];
            $data_upd = array('stok' => $stok,);
            DB::table('tbl_barang')->where('id_brg', $keranjang[$i]['id_brg'])->update($data_upd);

            $this->PesananModel->addData('tbl_detail_pesanan', $detail);
        }

        session()->forget('tambah_keranjang');
        return redirect()->route('bayar', [$bayar[0]->id_pesanan]);
    }

    //halaman bayar
    public function bayar($id)
    {
        $id_pesanan = $id;
        return view('user.v_bayar', compact('id_pesanan'));
    }

    public function insBukti()
    {
        $file = Request()->bukti_tf;
        $fileName = time() . '.' . Request()->bukti_tf->extension();
        $file->move(public_path('foto/struk_pembayaran'), $fileName);
        $data = ['bukti_tf' => $fileName, 'status' => 3,];
        $w = ['id_pesanan' => Request()->id_pesanan,];

        $this->PesananModel->editData($w, $data);
        return redirect()->route('riwayat');
    }

    // Cari Barang
    public function cariBarang()
    {
        $data = [
            'barang' => $this->BarangModel->cariBarang(Request()->nama),
        ];
        if (Request()->route == 'home') {
            return view('user.v_dashboard', $data);
        } else {
            return view('user.v_produk', $data);
        }
    }
}
