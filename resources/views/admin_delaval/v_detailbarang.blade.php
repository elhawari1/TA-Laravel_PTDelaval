@extends('layout_admin.v_template')
@section('title','Dashboard')

@section('content')
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">

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

      </div><!-- /.container-fluid -->
    </section>
@endsection
