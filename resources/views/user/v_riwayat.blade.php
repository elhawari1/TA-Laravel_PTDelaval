@extends('layout_user.v_template')
@section('css')
{{-- Modal Image --}}
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
@endsection
@section('content')
<div class="container" style="font-family: Poppins, Arial, sans-serif;">
    <div class="box">
        <!-- /.box-header -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title" style="font-family: Poppins, Arial, sans-serif;">Data Pesanan</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Pemesan</th>
                            <th>Nomer Telepon</th>
                            <th>Alamat Pemesan</th>
                            <th>Tanggal Pemesanan</th>
                            <th>Batas Pembayaran</th>
                            <th>Bukti Tranfer</th>
                            <th>Status</th>
                            <th style="width:20%;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; ?>
                        @foreach ($pesanan as $data)
                        @if ($data->id == Auth::user()->id)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $data->name }}</td>
                            <td>{{ $data->no_hp }}</td>
                            <td>{{ $data->alamat }}</td>
                            <td><?php $date = date_create($data->tgl_pesan); echo date_format($date,'d-m-Y'); ?></td>
                            <td><?php $date = date_create($data->batas_bayar); echo date_format($date,'d-m-Y'); ?></td>
                            <td>
                                <?php if ($data->bukti_tf == null) {
                                    echo 'belum upload struk';
                                } else {
                                ?>
                                    <img src="{{ url('foto/struk_pembayaran/' . $data->bukti_tf) }}" width="100px;cursor:pointer" height="100px" onclick="onClick(this)">
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
                            <td>
                                @if ($data->status != 1)
                                <a href="/bayar/{{ $data->id_pesanan }}" class="btn-sm btn-success mr-1" onclick="sweetAlert()">
                                    Bayar
                                </a>
                                    @if($data->status == 0 || $data->status == 2)
                                         <button type="button" class="btn-sm btn-danger" style="height: 28px;"data-toggle="modal" data-target="#delete{{ $data->id_pesanan }}">
                                            Batal</i>
                                        </button>
                                    @endif
                                @endif
                                <a href="/riwayat/detail/{{ $data->id_pesanan }}" class="btn-sm btn-warning">Detail
                                </a>
                            </td>
                        </tr>
                        @endif
                        @endforeach
                        @if ($no == 1)
                        <tr>
                            <td colspan="9">
                                <h4>Anda belum melakukan pembelian</h4>
                            </td>
                        </tr>
                        @endif
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.box-body -->
        <div align="left">
            <a href="/" class="btn btn-sm btn-danger" style="width: 150px; border-radius: 50px">Kembali</a>
        </div>
    </div>
</div>

@foreach ($pesanan as $data)
<div class="modal modal-danger fade" id="delete{{ $data->id_pesanan }}">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                {{-- <h2 class="modal-title">{{ $data->id }}</h2> --}}

            </div>
            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="float: right;">
                    X</button>
                <p>Apakah anda yakin ingin menghapus pesanan anda ?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">No</button>
                <a href="/riwayat/hapus/{{ $data->id_pesanan }}" class="btn btn-outline">Yes</a>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
@endforeach

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
