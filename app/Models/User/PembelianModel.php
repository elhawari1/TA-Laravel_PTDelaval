<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class PembelianModel extends Model
{
    public function allData()
    {
        return DB::table('tbl_pesanan')->get();
    }

    public function lastIns()
    {
        return DB::table('tbl_pesanan')->limit(1)->orderBy('id_pesanan', 'desc')->get();
    }

    public function addData($data)
    {
        DB::table('tbl_pesanan')->insert($data);
    }

    public function editData($w, $data)
    {
        DB::table('tbl_pesanan')->where($w)->update($data);
    }
}
