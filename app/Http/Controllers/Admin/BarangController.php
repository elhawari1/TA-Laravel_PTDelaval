<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\BarangModel;
use Illuminate\Support\Facades\Auth;

class BarangController extends Controller
{
    public function __construct()
    {
        $this->BarangModel = new BarangModel();
    }

    //tampil data
    public function index()
    {
        if (Auth::user()->role == 2) {
            $data = [
                'barang' => $this->BarangModel->allData(),
            ];
            return view('user.v_dashboard', $data);
        } else {
            $data = [
                'barang' => $this->BarangModel->allData(),

            ];
            return view('admin_delaval.v_barang', $data);
        }
    }

    //link tambah data
    public function add()
    {
        if (Auth::user()->role == 2) {
            $data = [
                'barang' => $this->BarangModel->allData(),
            ];
            return view('user.v_dashboard', $data);
        } else {
            return view('admin_delaval.v_addbarang');
        }
    }

    //validasi dan add
    public function insert()
    {
        Request()->validate([
            'nama' => 'required',
            'gambar' => 'required|mimes:jpg,jpeg,bmp,png|max:1024',
            'deskripsi' => 'required',
            'harga' => 'required',
            'stok' => 'required',
            'tanggal' => 'required',
        ], [
            'nama.required' => ' wajib diisi',
            'gambar.required' => ' wajib diisi',
            'deskripsi.required' => ' wajib diisi',
            'harga.required' => ' wajib diisi',
            'stok.required' => ' wajib diisi',
            'tanggal.required' => ' wajib diisi',
        ]);
        //jika validasi tidak ada maka simpan data
        //upload gambar / foto
        $file = Request()->gambar;
        $fileName = Request()->nama . '.' . $file->extension();
        $file->move(public_path('foto/barang'), $fileName);

        $data = [
            'nama' => Request()->nama,
            'gambar' => $fileName,
            'deskripsi' => Request()->deskripsi,
            'harga' => Request()->harga,
            'stok' => Request()->stok,
            'tanggal' => Request()->tanggal,
        ];

        $this->BarangModel->addData($data);
        return redirect()->route('barang')->with('pesan', 'Data Berhasil Di Tambahkan');
    }

    public function edit($id_brg)
    {
        if (Auth::user()->role == 2) {
            $data = [
                'barang' => $this->BarangModel->allData(),
            ];
            return view('user.v_dashboard', $data);
        }
        if (!$this->BarangModel->detailData($id_brg)) {
            abort(404);
        } else {
            $data = [
                'barang' => $this->BarangModel->detailData($id_brg),
            ];
            return view('admin_delaval.v_editbarang', $data);
        }
    }

    //validasi update
    public function update($id_brg)
    {

        Request()->validate([
            'nama' => 'required',
            'gambar' => 'mimes:jpg,jpeg,bmp,png|max:1024',
            'deskripsi' => 'required',
            'harga' => 'required',
            'stok' => 'required',
            'tanggal' => 'required',
        ], [
            'nama.required' => ' wajib diisi',
            'deskripsi.required' => ' wajib diisi',
            'harga.required' => ' wajib diisi',
            'stok.required' => ' wajib diisi',
        ]);
        //jika validasi tidak ada maka simpan data
        if (Request()->gambar <> "") {
            //jika ingin ganti foto
            //upload gambar / foto
            $file = Request()->gambar;
            $fileName = Request()->nama . '.' . $file->extension();
            $file->move(public_path('foto/barang'), $fileName);

            $data = [
                'nama' => Request()->nama,
                'gambar' => $fileName,
                'deskripsi' => Request()->deskripsi,
                'harga' => Request()->harga,
                'stok' => Request()->stok,
                'tanggal' => Request()->tanggal,
            ];
            $this->BarangModel->editData($id_brg, $data);
        } else {
            //jika tidak ingin ganti foto
            $data = [
                'nama' => Request()->nama,
                'deskripsi' => Request()->deskripsi,
                'harga' => Request()->harga,
                'stok' => Request()->stok,
                'tanggal' => Request()->tanggal,
            ];
            $this->BarangModel->editData($id_brg, $data);
        }
        return redirect()->route('barang')->with('pesan', 'Data Berhasil Diubah');
    }

    public function delete($id_brg)
    {
        //hapus foto di folder public
        $barang = $this->BarangModel->detailData($id_brg);
        if ($barang->gambar <> "") {
            unlink(public_path('foto/barang') . '/' . $barang->gambar);
        }
        $this->BarangModel->deleteData($id_brg);
        return redirect()->route('barang')->with('pesan', 'Data Berhasil Dihapus');
    }
}
