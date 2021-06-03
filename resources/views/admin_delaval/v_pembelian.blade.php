@extends('layout_admin.v_template')
@section('title','Data Pembelian')

@section('content')
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Data Pembelian</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/">Home</a></li>
              <li class="breadcrumb-item active">Data Pembelian</li>
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
                <h3 class="card-title">Data Pembelian</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama Pemesan</th>
                    <th>Alamat Pengirim</th>
                    <th>Tanggal Pemesanan</th>
                    <th>Batas Pembayaran</th>
                    <th>Aksi</th>
                  </tr>
                  </thead>
                  <tbody>
                  <tr>
                    <td>1</td>
                    <td>Abudall</td>
                    <td>Malang</td>
                    <td>12</td>
                    <td>14</td>
                    <td>
                        <a href="" class="btn btn-sm btn-success">Detail</a>
                    </td>
                  </tr>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>

      </div><!-- /.container-fluid -->
    </section>
@endsection
