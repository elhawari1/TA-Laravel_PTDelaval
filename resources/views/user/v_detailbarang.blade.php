@extends('layout_user.v_template')
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
                            @if ($barang->stok != 0)
                            <td>Stok</td>
                            <td><strong>{{ $barang->stok }}</strong></td>
                            @else
                            <td>Stok</td>
                            <td><strong class="card-text text-danger"> Barang Habis</strong></td>
                            @endif
                        </tr>

                        <tr>
                            <td>Harga</td>
                            <td><strong>
                                    <div class="btn btn-sm btn-success">
                                        Rp.{{ number_format($barang->harga, 0, ',', '.') }}
                                    </div>
                                </strong></td>
                        </tr>
                    </table>
                    @if ($barang->stok != 0)
                    <a href="/keranjang/tambah/{{ $barang->id_brg }}" class="btn btn-primary pull-left" style="width: 200px; border-radius: 50px">Tambah Keranjang</a>
                    @else
                    <button class="btn btn-sm btn-success" style="width: 100px; border-radius: 50px" onclick="sweetAlert2()" disabled>Beli</button>
                    @endif
                    <a href="/" class="btn btn-danger pull-left" style="width: 100px; border-radius: 50px">Kembali</a><br>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
