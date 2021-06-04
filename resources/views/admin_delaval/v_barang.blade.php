@extends('layout_admin.v_template')
@section('title', 'Data Barang')

@section('content')

@if (session('pesan'))
<div class="alert alert-success alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <h4><i class="icon fa fa-check"></i> Success!</h4>
    {{ session('pesan') }}.
</div>
@endif

<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Data Barang</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item active">Data Barang</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
    <div class="container-fluid">

        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Data Barang</h3>
                <a href="/barang/add" class="btn btn-outline-primary" style="float: right"><i class="icon fa fa-plus"></i></a>
                {{-- <a href="/barang/print" target="_blank" class="btn btn-info pull-right" style="margin-right: 5px;"><i class="fa fa-download"></i>Print to Printer</a>
                <a href="/barang/printpdf" target="_blank" class="btn btn-dark pull-right" style="margin-right: 5px;"><i class="fa fa-download"></i>Print to Pdf</a> --}}
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Gambar</th>
                            <th>Deskripsi</th>
                            <th>Harga</th>
                            <th>Stok</th>
                            <th>Tanggal</th>
                            <th>Action</th>
                            <th colspan="2"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; ?>
                        @foreach ($barang as $data)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $data->nama }}</td>
                            <td><img src="{{ url('foto/barang/' . $data->gambar) }}" width="100px" height="100px"></td>
                            <td>{{ $data->deskripsi }}</td>
                            <td>{{ $data->harga }}</td>
                            <td>{{ $data->stok }}</td>
                            <td>{{ $data->tanggal }}</td>
                            <td colspan="2">
                                {{-- <a href="/barang/detail/{{ $data->id_brg }}" class="btn btn-sm btn-success">Detail</a> --}}
                                <a href="/barang/edit/{{ $data->id_brg }}" class="btn btn-warning"><i class="icon fa fa-edit"></i></a>
                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete{{ $data->id_brg }}">
                                    <i class="icon fa fa-trash"></i>
                                </button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>

    </div><!-- /.container-fluid -->
</section>

@foreach ($barang as $data)
<div class="modal modal-danger fade" id="delete{{ $data->id_brg }}">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">{{ $data->nama }}</h4>
            </div>
            <div class="modal-body">
                <p>Apakah Anda Yakin Ingin Hapus Data Ini...??!!</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">No</button>
                <a href="/barang/delete/{{ $data->id_brg }}" class="btn btn-outline">Yes</a>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
@endforeach
@endsection