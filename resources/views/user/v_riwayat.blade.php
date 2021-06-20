@extends('layout_user.v_template')
@section('title', 'Riwayat Saya')
@section('css')
{{-- Modal Image --}}
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
@endsection
@section('content')
<div class="container">
    <div class="box">
        <!-- /.box-header -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Data Pesanan</h3>
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
                            <th>Bukti Tranfer</th>
                            <th>Status</th>
                            <th style="width:13%;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; ?>
                        @foreach ($pesanan as $data)
                        @if ($data->id == Auth::user()->id)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $data->name }}</td>
                            <td>{{ $data->alamat }}</td>
                            <td>{{ $data->tgl_pesan }}</td>
                            <td>{{ $data->batas_bayar }}</td>
                            <td>
                                <?php if ($data->bukti_tf == null) {
                                        echo 'belum upload struk';
                                        } else {
                                        ?>
                                <img src="{{ url('foto/struk_pembayaran/' . $data->bukti_tf) }}"
                                    width="150px;cursor:pointer" height="50px" onclick="onClick(this)">
                                <?php
                                        } ?>
                            </td>
                            <td>
                                @if ($data->status == 1)
                                <span class="badge badge-success">Sudah Bayar</span>
                                @elseif ($data->status == 0)
                                <span class="badge badge-danger">Belum Bayar</span>
                                @elseif ($data->status == 2)
                                <span class="badge badge-warning">Di Tolak</span>
                                @elseif ($data->status == 3)
                                <span class="badge badge-primary">Di Proses</span>
                                @endif
                            </td>
                            <td colspan="2">
                                @if ($data->status == 1)
                                @elseif ($data->status == 0)
                                <a href="/bayar/{{ $data->id_pesanan }}" class="btn-sm btn-success mr-1"
                                    onclick="sweetAlert()">
                                    Bayar
                                </a>
                                @elseif ($data->status == 2)
                                <a href="/bayar/{{ $data->id_pesanan }}" class="btn-sm btn-success mr-1"
                                    onclick="sweetAlert()">
                                    Bayar
                                </a>
                                @elseif ($data->status == 3)
                                <a href="/bayar/{{ $data->id_pesanan }}" class="btn-sm btn-success mr-1"
                                    onclick="sweetAlert()">
                                    Bayar
                                </a>
                                @endif
                                <a href="/riwayat/detail/{{ $data->id_pesanan }}" class="btn-sm btn-warning">Detail
                                </a>
                            </td>
                        </tr>
                        @endif
                        @endforeach
                        @if ($no == 1)
                        <tr>
                            <td colspan="8"><h4> Riwayat Anda Kosong</h4></td>
                        </tr>
                        @endif
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.box-body -->
        <div align="right">
            <a href="/pt_delaval" class="btn btn-sm btn-danger" style="width: 150px; border-radius: 50px">Kembali</a>
        </div>
    </div>
</div>

<div id="modal01" class="w3-modal" onclick="this.style.display='none'">
    <span class="w3-button w3-hover-red w3-xlarge w3-display-topright">&times;</span>
    <div class="w3-modal-content w3-animate-zoom">
        <img id="img01" style="width:100%">
    </div>
</div>
@endsection
@section('js')
{{-- Modal Image --}}
<script>
    function onClick(element) {
        document.getElementById("img01").src = element.src;
        document.getElementById("modal01").style.display = "block";
    }

</script>
@endsection
