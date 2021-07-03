@extends('layout_user.v_template')
@section('content')

<div class="container">
    <?php
        $keranjang = session()->get('tambah_keranjang');
        $barang = DB::table('tbl_pesanan')
        ->where('id_pesanan', $id_pesanan)
        ->first();

        $subtotal = $barang->total;
        echo '<p><h5>Untuk melakukan pembayaran silahkan ikuti instruksi di bawah ini :</p>
        <ol>
        <li>Anda dapat mengirim barang pembelian anda seharga Rp. '. number_format($subtotal, 0, ',', '.');
        echo ' ke rekening 0051-01-050113-53-1 (BANK BRI) A.N TEGUH ANANTA ERLANGGA.</li>
        <li>Setelah melakukan pembayaran silahkan unggah bukti pembayaran anda pada kolom di bawah ini.</li>
        <li>Harap menyelesaikan pembayaran sebelum tanggal yang ditentukan.'
    ?>
    <div class="card-body">
        <form action="/bayar/insert" method="post" enctype="multipart/form-data">
            @csrf
        <input type="hidden" name="id_pesanan" value="{{ $id_pesanan }}">
        <div class="form-group">
            <h4>Unggah bukti pembayaran</h4>
            <input id="input-fa" type="file" name="bukti_tf" class="form-control file" data-browse-on-zone-click="true" value="{{ old('bukti_tf') }}">
            <div class="text-danger">
                @error('bukti_tf')
                {{ $message }}
                @enderror
            </div>
        </div>

        <div align="right">
            <a href="/keranjang">
                <div class="btn btn-danger" style="width: 100px; border-radius: 50px">Kembali</div>
            </a>
            <button type="submit" class="btn btn-primary" style="width: 100px; border-radius: 50px">
                Bayar
            </button>
        </div>
        </form>
    </div>
</div>
@endsection
