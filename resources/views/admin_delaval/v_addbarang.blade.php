@extends('layout_admin.v_template')
@section('title','Tambah Barang')

@section('content')


<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Tambah Barang  </h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/">Home</a></li>
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

<<<<<<< HEAD
         <form action="/barang/insert" method="POST" enctype="multipart/form-data">
=======
        <form action="/barang/insert" method="POST" enctype="multipart/form-data">
>>>>>>> 62b6f2f (fix frontend admin, login dan register)
        @csrf
        <div class="content">
            <div class="row">

                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Nama</label>
                        <input type="text" name="nama" class="form-control" value="{{ old('nama') }}">
                        <div class="text-danger">
                            @error('nama')
                            {{ $message }}
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Gambar</label>
                        <input id="input-fa"type="file" name="gambar" class="form-control file" value="{{ old('gambar') }}" data-browse-on-zone-click="true">
                        <div class="text-danger">
                            @error('gambar')
                            {{ $message }}
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Deskripsi</label>
                        <input type="text" name="deskripsi" class="form-control" value="{{ old('deskripsi') }}">
                        <div class="text-danger">
                            @error('deskripsi')
                            {{ $message }}
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Harga</label>
                        <input type="number" name="harga" class="form-control" value="{{ old('harga') }}">
                        <div class="text-danger">
                            @error('harga')
                            {{ $message }}
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Stok</label>
                        <input type="number" name="stok" class="form-control" value="{{ old('stok') }}">
                        <div class="text-danger">
                            @error('stok')
                            {{ $message }}
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Tanggal</label>
                        <input type="date" name="tanggal" class="form-control" value="{{ old('tanggal') }}">
                        <div class="text-danger">
                            @error('tanggal')
                            {{ $message }}
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                       <button class="btn btn-primary btn-sm"> Simpan</button>
                    </div>
                </div>
            </div>
    </form>

      </div><!-- /.container-fluid -->
    </section>
@endsection
