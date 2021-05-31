@extends('layout.v_template')
@section('title','Komentar User')

@section('content')

 <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data Komentar User</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Telepon</th>
                    <th>Pesan</th>
                    <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                    <?php $no = 1; ?>
                    @foreach ($komentar as $data)
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $data->nama }}</td>
                    <td>{{ $data->email }}</td>
                    <td>{{ $data->telepon }}</td>
                    <td>{{ $data->pesan }}</td>
                    <td>
                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete{{ $data->id }}">
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

    @foreach ($komentar as $data)
        <div class="modal modal-danger fade" id="delete{{ $data->id }}">
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
                        <a href="/komentar/delete/{{ $data->id }}" class="btn btn-outline">Yes</a>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection
