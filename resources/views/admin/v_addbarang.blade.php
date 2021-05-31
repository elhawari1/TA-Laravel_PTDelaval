@extends('layout.v_template')
@section('title', 'Tambah Barang')
@section('content')

    <form action="/barang/insert" method="POST" enctype="multipart/form-data">
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
                        <label>Kategori</label>
                        <input type="text" name="kategori" class="form-control" value="{{ old('kategori') }}">
                        <div class="text-danger">
                            @error('kategori')
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

@endsection
