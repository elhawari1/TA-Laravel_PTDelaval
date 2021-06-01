@extends('layout_user.v_template')
@section('title', 'Pembayaran saya')
@section('content')
<div class="container">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Pembayaran</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body ">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Harga</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                                <td>No</td>
                                <td>Nama</td>
                                <td>Harga</td>
                                <td>Total</td>
                        </tbody>
                    </table>
                    <div align="right">
                        <a href=""><div class="btn btn-info">Bayar</div></a>
                    </div>
            </div>
            <!-- /.box-body -->
        </div>
    </div>
@endsection
