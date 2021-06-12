@extends('layout_user.v_template')
@section('title', 'Keranjang saya')
@section('content')

<div class="container">
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Keranjang</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body ">
            <?php $subtotal=0 ?>
            <?php $no = 1; ?>
            <?php $a = DB::table('tbl_barang')->Get(); ?>

            <?php $keranjang = session()->get('tambah_keranjang'); ?>
            @if ($keranjang)
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Harga Satuan</th>
                        <th>Jumlah</th>
                        <th>Sub-Total</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; ?>
                    @foreach (session('tambah_keranjang') as $cart)
                    <?php $barang = DB::table('tbl_barang')
                                ->where('id_brg', $cart['id_brg'])
                                ->first(); ?>
                    @if($cart['jumlah']<1) @else
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $barang->nama }}</td>
                        <td>Rp. {{ number_format($barang->harga, 0, ',','.') }}</td>
                        <td>
                            <a href="{{ url('/kurang', [$cart['id_brg']]) }}"><i class="fas fa-minus"></i></a>
                            {{ $cart['jumlah'] }}
                            <a href="{{ url('/tambah', [$cart['id_brg']]) }}"><i class="fas fa-plus"></i></a>
                        </td>
                        <td>Rp. {{ number_format($barang->harga * $cart['jumlah'] , 0, ',','.') }}</td>
                    </tr>
                    @endif
                    <?php $subtotal +=$barang->harga * $cart['jumlah'] ?>
                    @endforeach
                    <tr>
                        <td colspan="4"></td>
                        <td align="right">Rp. {{ number_format($subtotal, 0, ',','.') }}</td>
                    </tr>
                </tbody>
            </table>
            <div align="right">
                <a href="/hapuskeranjang" class="btn-lg btn-danger">Hapus Belanja</a>

                <a href="/produk" class="btn-lg btn-primary">Lanjutkan Belanja</a>

                <a href="/pembayaran" class="btn-lg btn-success">Pembayaran</a>
            </div>

            @else
            <div align="center">
                <h4>Keranjang belanja anda kosong</h1>
                    <a href="/produk" class="btn-sm btn-success">Cari Barang Belanja</a>
            </div>
            @endif
        </div>
        <!-- /.box-body -->
    </div>
</div>
@endsection
