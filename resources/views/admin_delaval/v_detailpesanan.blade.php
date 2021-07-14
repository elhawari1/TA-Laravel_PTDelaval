@extends('layout_admin.v_template')
@section('title','Detail Pesanan')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Detail Pesanan</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/pesanan">Pesanan</a></li>
                    <li class="breadcrumb-item active">Detail Pesanan</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
    <div class="container-fluid">

        <?php
        echo '<p><h5>Tujuan Pengiriman : '.($pesanan[0]->alamat) .', '.($pesanan[0]->kode_pos) .', Kec. '.($pesanan[0]->kecamatan) .', Kel. '.($pesanan[0]->kelurahan) .', '.($pesanan[0]->koten) .' </h5></p>'
        ?>
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Detail Pesanan</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Barang</th>
                            <th>Harga Satuan</th>
                            <th>Kuantitas</th>
                            <th>Subtotal</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $total = 0; ?>
                        <?php $no = 1; ?>
                        @foreach ($pesanan as $data)
                        <?php $harga =  $data->subtotal / $data->jumlah_brg; ?>
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $data->barang }}</td>
                            <td>Rp.{{ number_format($harga, 2, ',', '.') }}</td>
                            <td>{{ $data->jumlah_brg }}</td>
                            <td>Rp.{{ number_format($data->subtotal, 0, ',', '.') }}</td>
                        </tr>
                        <?php $total += $data->subtotal ; ?>
                        @endforeach
                        <tr>
                            <td colspan="4" align="right">Total :</td>
                            <td>Rp. {{ number_format($total, 0, ',', '.') }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
        <div>
            <a href="/pesanan" class="btn btn-danger btn-sm">Kembali</a>
        </div>
    </div><!-- /.container-fluid -->
</section>
@endsection
