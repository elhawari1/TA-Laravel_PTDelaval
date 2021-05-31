<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class BarangModel extends Model
{
    public function allData()
    {
        return DB::table('tbl_barang')->get();
    }

    public function detailData($id_brg)
    {
        return DB::table('tbl_barang')->where('id_brg', $id_brg)->first();
    }

    public function addData($data)
    {
        DB::table('tbl_barang')->insert($data);
    }

    public function editData($id_brg, $data)
    {
        DB::table('tbl_barang')->where('id_brg', $id_brg)->update($data);
    }

    public function deleteData($id_brg)
    {
        DB::table('tbl_barang')->where('id_brg', $id_brg)->delete();
    }
}
