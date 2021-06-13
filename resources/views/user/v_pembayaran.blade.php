@extends('layout_user.v_template')
@section('title', 'Pembayaran saya')

@section('content')
    <div class="container">
        <div class="box-header">
            <h3 class="box-title">Pembayaran</h3>
        </div>
        <?php
        $subtotal = 0;
        $keranjang = session()->get('tambah_keranjang');

        foreach (session('tambah_keranjang') as $cart):
        $barang = DB::table('tbl_barang')
        ->where('id_brg', $cart['id_brg'])
        ->first();

        $subtotal += $barang->harga * $cart['jumlah'];
        endforeach;
        echo '<h4>Total Belanja Anda: Rp. ' . number_format($subtotal, 0, ',', '.');
            ?>
            <div class="card-body">
                <h6>Nama</h6>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">@</span>
                    </div>
                    <input type="text" name="nama" placeholder="Nama Lengkap" class="form-control">

                </div>

                <h6>Alamat Lengkap</h6>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">@</span>
                    </div>
                    <input type="text" name="alamat" placeholder="Alamat Lengkap" class="form-control">
                </div>

                <h6>Kode Pos</h6>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">@</span>
                    </div>
                    <input type="number" name="alamat" placeholder="Kode Pos" class="form-control">
                </div>

                <h6>No Telpon</h6>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">@</span>
                    </div>
                    <input type="text" name="no_telpon" placeholder="No Telpon" class="form-control">
                </div>

                <div align="right">
                    <a href="/keranjang">
                        <div class="btn btn-danger" style="width: 100px; border-radius: 50px">Kembali</div>
                    </a>
                    <a href="/bayar">
                        <div class="btn btn-primary" style="width: 100px; border-radius: 50px" onclick="sweetAlert()">Bayar</div>
                    </a>
                </div>
            </div>
    </div>
@endsection
