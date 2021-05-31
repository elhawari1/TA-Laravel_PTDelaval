@extends('layout.v_template')
@section('title','Pembelian')

@section('content')

<div class="box">
            <div class="box-header">
              <h3 class="box-title">Data Komentar & Kritik</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
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
            <!-- /.box-body -->
          </div>
@endsection
