@extends('layout.v_template')
@section('title', 'Barang')

@section('content')

@if (session('pesan'))
    <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h4><i class="icon fa fa-check"></i> Success!</h4>
            {{ session('pesan') }}.
    </div>
@endif
     <div class="box">
            <div class="box-header">
              <a href="/barang/add" class="btn btn-primary pull-left" style="margin-top: 18px;">Tambah Barang</a><br>
              <a href="/barang/print" target="_blank" class="btn btn-info pull-right" style="margin-right: 5px;"><i class="fa fa-download"></i>Print to Printer</a>
              <a href="/barang/printpdf" target="_blank" class="btn btn-dark pull-right" style="margin-right: 5px;"><i class="fa fa-download"></i>Print to Pdf</a>

            </div>
            <!-- /.box-header -->
            <div class="box-body">
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
                </tr>
                </thead>
                <tbody>
                    <?php $no = 1; ?>
                    @foreach ($barang as $data)
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $data->nama }}</td>
                    <td><img src="{{ url('foto/barang/' . $data->gambar) }}" width="150px"></td>
                    <td>{{ $data->deskripsi }}</td>
                    <td>{{ $data->harga }}</td>
                    <td>{{ $data->stok }}</td>
                    <td>{{ $data->tanggal }}</td>
                    <td>
                        {{-- <a href="/barang/detail/{{ $data->id_brg }}" class="btn btn-sm btn-success">Detail</a> --}}
                        <a href="/barang/edit/{{ $data->id_brg }}" class="btn btn-sm btn-warning">Edit</a>
                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete{{ $data->id_brg }}">
                            Delete
                        </button>
                    </td>
                </tr>
                    @endforeach
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>

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
