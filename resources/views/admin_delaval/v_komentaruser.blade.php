@extends('layout_admin.v_template')
@section('title','Data Komentar User')

@section('content')
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Data Komentar User</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/">Home</a></li>
              <li class="breadcrumb-item active">Data Komentar User</li>
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
                <h3 class="card-title">Data Komentar User</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
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
              <!-- /.card-body -->
            </div>

      </div><!-- /.container-fluid -->
    </section>

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
