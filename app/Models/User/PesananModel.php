<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Model;
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
        ->select('a.*', 'c.nama as barang')
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
}
