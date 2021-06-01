@extends('layout.v_template')
@section('title', 'Detail Barang')
@section('content')

    <table class="table">
        <tr>
            <th width="100px">No</th>
            <th width="100px">:</th>
            <th>{{ $barang->id_brg }}</th>
        </tr>

        <tr>
            <th width="100px">Nama</th>
            <th width="100px">:</th>
            <th>{{ $barang->nama }}</th>
        </tr>

        <tr>
            <th width="100px">Deskripsi</th>
            <th width="100px">:</th>
            <th>{{ $barang->deskripsi }}</th>
        </tr>

        <tr>
            <th width="100px">Harga</th>
            <th width="100px">:</th>
            <th>{{ $barang->harga }}</th>
        </tr>

        <tr>
            <th width="100px">Stok</th>
            <th width="100px">:</th>
            <th>{{ $barang->stok }}</th>
        </tr>

        <tr>
            <th width="100px">Tanggal</th>
            <th width="100px">:</th>
            <th>{{ $barang->tanggal }}</th>
        </tr>

        <tr>
            <th width="100px">Gambar</th>
            <th width="100px">:</th>
            <th><img src="{{ url('foto/barang/'.$barang->gambar) }}" width="400px"></th>
        </tr>
        <tr>
            <th><a href="/barang" class="btn btn-success tbn-sm">Kembali</a></th>
        </tr>
    </table>




@endsection
