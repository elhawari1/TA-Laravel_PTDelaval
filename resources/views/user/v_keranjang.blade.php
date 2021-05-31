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
                <?php $no = 1; ?>
                <?php $a = DB::table('tbl_barang')->Get(); ?>

                <?php $keranjang = session()->get('tambah_keranjang'); ?>
                @if ($keranjang)
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Harga</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; ?>
                            @foreach ($keranjang as $cart)
                                <?php $barang = DB::table('tbl_barang')
                                ->where('id_brg', $cart['id_brg'])
                                ->first(); ?>
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $barang->nama }}</td>
                                    <td>{{ $barang->harga }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div align="right">
                        <a href="/produk"><div class="btn btn-info">Lanjutkan Belanja</div></a>
                        <a href="/pembayaran"><div class="btn btn-success">Pembayaran</div></a>
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
