@extends('layout_user.v_template')
@section('content')

<div class="container">
    <div class="box">
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
                            <td colspan="4"></td>
                            <td align="right">Rp. {{ number_format($total, 0, ',', '.') }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
        <?php
            echo '<p><h5>Tujuan Pengiriman : '.($pesanan[0]->alamat) .', '.($pesanan[0]->kode_pos) .', Kec. '.($pesanan[0]->kecamatan) .', Kel. '.($pesanan[0]->kelurahan) .', '.($pesanan[0]->koten) .' </h5></p>'
        ?>
        <div align="left">
            <a href="/riwayat" class="btn btn-danger btn-sm" style="width: 150px; border-radius: 50px">Kembali</a>
        </div>
    </div>
</div>

@endsection
