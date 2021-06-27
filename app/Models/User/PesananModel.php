<?php

namespace App\Models\User;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;

class PesananModel extends Model
{

    public function allData()
    {
        return DB::table('tbl_pesanan as a')
        ->join('users as b', 'a.id', '=', 'b.id')
        ->select('a.*', 'b.name')
        ->get();
    }

    //detail
    public function detailData($id_pesanan)
    {
        return DB::table('tbl_detail_pesanan as a')
        ->join('tbl_pesanan as b', 'a.id_pesanan', '=', 'b.id_pesanan')
        ->join('tbl_barang as c', 'a.id_brg', '=', 'c.id_brg')
        ->select('a.*', 'c.nama as barang', 'b.*')
        ->where('a.id_pesanan', $id_pesanan)
        ->get();
    }

    public function lastIns()
    {
        return DB::table('tbl_pesanan')->limit(1)->orderBy('id_pesanan', 'desc')->get();
    }

    public function addData($t, $data)
    {
        DB::table($t)->insert($data);
    }

    public function editData($w, $data)
    {
        DB::table('tbl_pesanan')->where($w)->update($data);
    }

    // stok kembali

    public function getPesananBelumBayar()
    {
      return DB::table('tbl_pesanan')->where('status',0)->get();
    }

    public function getPesananTenggat($tenggat)
    {
      return DB::table('tbl_pesanan')->where('batas_bayar',$tenggat)->where('status',0)->get();
    }

    public function cekPesananTenggat()
    {
      $data = $this->getPesananTenggat(date_format(new Carbon(),'Y-m-d'));
      foreach ($data as $dataPesanan) {
        $this->getDetailTransaksiBelumBayarAndRevokeStok($dataPesanan->id_pesanan);

        $this->deleteDetailPesanan($dataPesanan->id_pesanan);
        $this->deletePesanan($dataPesanan->id_pesanan);
      }
      return $data;
    }

    public function getDetailTransaksiBelumBayarAndRevokeStok($id)
    {
      $dataDetailPesanan = DB::table('tbl_detail_pesanan')->where('id_pesanan',$id)->get();
      foreach ($dataDetailPesanan as $ddp) {
        DB::table('tbl_barang')->where('id_brg',$ddp->id_brg)->increment('stok',$ddp->jumlah_brg);
      }
    }

    public function deleteDetailPesanan($id)
    {
      return DB::table('tbl_detail_pesanan')->where('id_pesanan',$id)->delete();
    }

    public function deletePesanan($id)
    {
      return DB::table('tbl_pesanan')->where('id_pesanan',$id)->delete();
    }
}
