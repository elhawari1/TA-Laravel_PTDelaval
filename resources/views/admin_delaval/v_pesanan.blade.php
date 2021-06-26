@extends('layout_admin.v_template')
@section('title','Data Pesanan')

@section('css')
<!-- DataTables -->
<link rel="stylesheet" href="{{ asset('template_admin') }}/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet"
    href="{{ asset('template_admin') }}/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
<link rel="stylesheet" href="{{ asset('template_admin') }}/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">

{{-- Modal Image --}}
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
@endsection

@section('content')
<div class="content-header" style="font-family: Poppins, Arial, sans-serif;">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0" style="font-family: Poppins, Arial, sans-serif;">Data Pesanan</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/">Dashboard</a></li>
                    <li class="breadcrumb-item active">Data Pesanan</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content" style="font-family: Poppins, Arial, sans-serif;">
    <div class="container-fluid">

        <div class="card">
            <!-- /.card-header -->
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Pemesan</th>
                            {{-- <th>Kota / Kabupaten</th>
                            <th>Kecamatan</th>
                            <th>Kelurahan</th> --}}
                            <th>Alamat Pengirim</th>
                            <th>Tanggal Pemesanan</th>
                            <th>Batas Bayar</th>
                            <th>Bukti Tranfer</th>
                            <th>Status</th>
                            <th style="width:10%;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; ?>
                        @foreach ($pesanan as $data)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $data->name }}</td>
                            {{-- <td>{{ $data->koten }}</td> --}}
                            {{-- <td>{{ $data->kelurahan }}</td> --}}
                            {{-- <td>{{ $data->kecamatan}}</td> --}}
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
                            <td colspan="3">
                                @if ($data->status == 3 )
                                <a href="/pesanan/terima/{{ $data->id_pesanan }}" class="btn-sm btn-success"><i
                                        class="icon fa fa-check"> </i></a>
                                <a href="/pesanan/tolak/{{ $data->id_pesanan }}" class="btn-sm btn-danger"><i
                                        class="icon fa fa-times"></i></a>
                                @endif
                                <a href="/pesanan/detail/{{ $data->id_pesanan }}" class="btn-sm btn-warning"><i
                                        class="icon fa fa-info"></i></a>
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

<div id="modal01" class="w3-modal" onclick="this.style.display='none'">
    <span class="w3-button w3-hover-red w3-xlarge w3-display-topright">&times;</span>
    <div class="w3-modal-content w3-animate-zoom">
        <img id="img01" style="width:100%">
    </div>
</div>
@endsection

@section('js')
<!-- DataTables  & Plugins -->
<script src="{{ asset('template_admin') }}/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="{{ asset('template_admin') }}/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="{{ asset('template_admin') }}/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="{{ asset('template_admin') }}/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="{{ asset('template_admin') }}/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="{{ asset('template_admin') }}/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="{{ asset('template_admin') }}/plugins/jszip/jszip.min.js"></script>
<script src="{{ asset('template_admin') }}/plugins/pdfmake/pdfmake.min.js"></script>
<script src="{{ asset('template_admin') }}/plugins/pdfmake/vfs_fonts.js"></script>
<script src="{{ asset('template_admin') }}/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="{{ asset('template_admin') }}/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="{{ asset('template_admin') }}/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- Page specific script -->
<script>
    $(function () {
        $("#example1").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "buttons": [{
                    extend: 'colvis',
                    postfixButtons: ['colvisRestore']
                },
                {
                    extend: 'pdf',
                    title: 'Data Pembelian Barang PT Agri Servis Sakti',
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4],
                        modifier: {
                            page: 'current'
                        }
                    }
                },
                {
                    extend: 'excel',
                    title: 'Data Pembelian Barang PT Agri Servis Sakti',
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4],
                        modifier: {
                            page: 'current'
                        }
                    }
                },
                {
                    extend: 'print',
                    title: 'Data Pembelian Barang PT Agri Servis Sakti',
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4],
                        modifier: {
                            page: 'current'
                        }
                    }
                },
            ]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    });

</script>

{{-- Modal Image --}}
<script>
    function onClick(element) {
        document.getElementById("img01").src = element.src;
        document.getElementById("modal01").style.display = "block";
    }

</script>
@endsection
