<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class KomentarModel extends Model
{
    public function allData()
    {
        return DB::table('komentar')->get();
    }

    public function addData($data)
    {
        DB::table('komentar')->insert($data);
    }

    public function deleteData($id_komentar)
    {
        DB::table('komentar')->where('id_komentar', $id_komentar)->delete();
    }

    public function allPengguna()
    {
        return DB::table('users')->get();
    }
}
