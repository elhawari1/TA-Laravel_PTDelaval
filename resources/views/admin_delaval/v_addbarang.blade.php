@extends('layout_admin.v_template')
@section('title','Tambah Barang')

@section('content')

<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Tambah Barang </h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/barang">Barang</a></li>
                    <li class="breadcrumb-item active">Tambah Barang </li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <form action="/barang/insert" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card-body">

                <h4>Nama</h4>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="nav-icon fa fa-shopping-bag"></i></span>
                    </div>
                    <input type="text" name="nama" placeholder="Nama Barang" class="form-control" value="{{ old('nama') }}">
                    <div class="text-danger">
                        @error('nama')
                        {{ $message }}
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <h4>Gambar</h4>
                    <input id="input-fa" type="file" name="gambar" class="form-control file" value="{{ old('gambar') }}" data-browse-on-zone-click="true">
                    <div class="text-danger">
                        @error('gambar')
                        {{ $message }}
                        @enderror
                    </div>
                </div>

                <h4>Deskripsi</h4>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="nav-icon fa fa-file-alt"></i></span>
                    </div>
                    <input type="text" name="deskripsi" placeholder="Deskripsi Barang" class="form-control" value="{{ old('deskripsi') }}">
                    <div class="text-danger">
                        @error('deskripsi')
                        {{ $message }}
                        @enderror
                    </div>
                </div>

                <h4>Harga</h4>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="nav-icon fa fa-money-bill"></i></span>
                    </div>
                    <input type="text" name="harga" placeholder="Harga Barang" class="form-control" value="{{ old('harga') }}">
                    <div class="text-danger">
                        @error('harga')
                        {{ $message }}
                        @enderror
                    </div>
                </div>

                <h4>Stok</h4>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="nav-icon fa fa-chart-line"></i></span>
                    </div>
                    <input type="number" name="stok" placeholder="Stok Barang" class="form-control" value="{{ old('stok') }}">
                    <div class="text-danger">
                        @error('stok')
                        {{ $message }}
                        @enderror
                    </div>
                </div>

                <h4>Tanggal</h4>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="nav-icon fa fa-calendar-alt"></i></span>
                    </div>
                    <input type="date" name="tanggal" class="form-control" value="{{ old('tanggal') }}">
                    <div class="text-danger">
                        @error('tanggal')
                        {{ $message }}
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <a href="/barang" class="btn btn-danger btn-sm">Kembali</a>
                    <button class="btn btn-primary btn-sm">Simpan</button>
                </div>
            </div>
        </form>

    </div><!-- /.container-fluid -->
</section>
@endsection
