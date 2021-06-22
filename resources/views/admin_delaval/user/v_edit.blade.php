@extends('layout_admin.v_template')
@section('title','Edit User')

@section('content')

<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Edit User </h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/barang">User</a></li>
                    <li class="breadcrumb-item active">Edit User </li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <form action="/user/update/{{$barang->id}}" method="POST">
            @csrf
            <div class="card-body">

                <h4>Nama</h4>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="nav-icon fa fa-user"></i></span>
                    </div>
                    <input type="text" name="nama" placeholder="Nama User" class="form-control" value="{{ $barang->name }}">
                    <div class="text-danger">
                        @error('nama')
                        {{ $message }}
                        @enderror
                    </div>
                </div>

                <h4>Email</h4>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="nav-icon fa fa-file-alt"></i></span>
                    </div>
                    <input type="email" name="email" placeholder="Email User" class="form-control" value="{{ $barang->email }}">
                    <div class="text-danger">
                        @error('email')
                        {{ $message }}
                        @enderror
                    </div>
                </div>

                <h4>Role</h4>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="nav-icon fa fa-money-bill"></i></span>
                    </div>
                    <select name="role" class="form-control" placeholder="Role User">
                      <option value="1" {{$barang->role == '1' ? 'Selected' : ''}}>Admin</option>
                      <option value="2" {{$barang->role == '2' ? 'Selected' : ''}}>User</option>
                    </select>
                    <div class="text-danger">
                        @error('role')
                        {{ $message }}
                        @enderror
                    </div>
                </div>

                <h4>Password</h4>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="nav-icon fa fa-chart-line"></i></span>
                    </div>
                    <input type="password" name="password" placeholder="Password User" class="form-control" value="{{ old('password') }}">
                    <div class="text-danger">
                        @error('password')
                        {{ $message }}
                        @enderror
                    </div>
                  </div>
                  <div class="text-danger">*Biarkan kosong apabila password tetap</div>

                <div class="form-group">
                    <a href="/user" class="btn btn-danger btn-sm">Kembali</a>
                    <button class="btn btn-primary btn-sm">Simpan</button>
                </div>
            </div>
        </form>

    </div><!-- /.container-fluid -->
</section>
@endsection
