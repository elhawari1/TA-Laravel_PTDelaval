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
        echo '<p><h5>Untuk melakukan pembayaran silahkan ikuti instruksi di bawah ini :</p>
        <ol>
        <li>Anda dapat mengirim barang pembelian anda seharga Rp. '. number_format($subtotal, 0, ',', '.'); 
        echo ' ke rekening XXX (BANK XXX) A.N XXX.</li>
        <li>Setelah melakukan pembayaran silahkan unggah bukti pembayaran anda pada kolom di bawah ini.</li>
        <li>Harap menyelesaikan pembayaran sebelum tanggal xxx.'
            ?>
            <div class="card-body">

            <div class="form-group">
                    <h4>Unggah bukti pembayaran</h4>
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
