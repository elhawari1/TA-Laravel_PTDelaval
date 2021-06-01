@extends('layout_user.v_template')
@section('title','Detail')
@section('content')

<div class="container-fluid">
    <div class="card">
        <h5 class="card-header">Detail Produk</h5>
        <div class="card-body">
            <div class="row">
                <div class="col-md-4">
                    <img src="{{ url('foto/barang/'.$barang->gambar) }}" class="card-img-top">
                </div>
                <div class="col-md-8">
                    <table class="table">
                        <tr>
                            <td>Nama Produk</td>
                            <td><strong>{{ $barang->nama }}</strong></td>
                        </tr>

                        <tr>
                            <td>Deskripsi</td>
                            <td><strong>{{ $barang->deskripsi }}</strong></td>
                        </tr>

                        <tr>
                            <td>Stok</td>
                            <td><strong>{{ $barang->stok }}</strong></td>
                        </tr>

                        <tr>
                            <td>Harga</td>
                            <td><strong>
                                    <div class="btn btn-sm btn-success">Rp.
                                        {{ number_format($barang->harga, 0, ',', '.') }}
                                    </div>
                                </strong></td>
                        </tr>
                    </table>
                    <a href="" class="btn btn-primary pull-left">Tambah Keranjang</a>
                    <a href="/pt_delaval" class="btn btn-danger pull-left">Kembali</a><br>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
