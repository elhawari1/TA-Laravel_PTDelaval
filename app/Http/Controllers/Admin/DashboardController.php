<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\BarangModel;
use App\Models\User\KomentarModel;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->KomentarModel = new KomentarModel();
        $this->BarangModel = new BarangModel();
    }

    public function index()
    {
        if (Auth::user()->role == 2) {
            $data = [
            'barang' => $this->BarangModel->allData(),
            ];
            return view('user.v_dashboard', $data);
        }else{
            return view('admin_delaval.v_dashboard');
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
            'komentar' => $this->KomentarModel->allData(),
        ];
        return view('admin_delaval.v_komentaruser', $data);
    }
    }

    public function delete($id)
    {
        //hapus foto di folder public
        $this->KomentarModel->deleteData($id);
        return redirect()->route('komentar')->with('pesan', 'Data Berhasil Di Hapus !!');
    }
}
