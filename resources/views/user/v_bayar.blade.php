@extends('layout_user.v_template')
@section('title','Bayar')
@section('content')

<div class="container">
        <?php
        $subtotal = 0;
        $keranjang = session()->get('tambah_keranjang');

        foreach (session('tambah_keranjang') as $cart):
        $barang = DB::table('tbl_barang')
        ->where('id_brg', $cart['id_brg'])
        ->first();

        $subtotal += $barang->harga * $cart['jumlah'];
        endforeach;
        echo '<h4>Total Pembayaran Belanja Anda: Rp. ' . number_format($subtotal, 0, ',', '.');
            ?>
            <div class="card-body">

            <div class="form-group">
                    <h4>Gambar</h4>
                    <input id="input-fa" type="file" name="gambar" class="form-control file" data-browse-on-zone-click="true">
                </div>

                <div align="right">
                    <a href="/keranjang">
                        <div class="btn btn-danger" style="width: 100px; border-radius: 50px">Kembali</div>
                    </a>
                    <button class="btn btn-primary" style="width: 100px; border-radius: 50px" onclick="sweetAlert()">Bayar</button>
                </div>
            </div>
    </div>

@endsection
