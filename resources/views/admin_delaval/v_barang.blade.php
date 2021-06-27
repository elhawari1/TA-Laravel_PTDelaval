@extends('layout_admin.v_template')
@section('title', 'Data Barang')

@section('css')
<!-- DataTables -->
<link rel="stylesheet" href="{{ asset('template_admin') }}/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="{{ asset('template_admin') }}/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
<link rel="stylesheet" href="{{ asset('template_admin'
) }}/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">

{{-- Modal Image --}}
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

@endsection

@section('content')
@if (session('pesan'))
<div class="alert alert-success alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <h4><i class="icon fa fa-check"></i> Success!</h4>
    {{ session('pesan') }}.
</div>
@endif

<div class="content-header" style="font-family: Poppins, Arial, sans-serif;">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0" style="font-family: Poppins, Arial, sans-serif;">Data Barang</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/">Dashboard</a></li>
                    <li class="breadcrumb-item active">Data Barang</li>
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
            <div class="card-header">
                <a href="/barang/add" class="btn btn-outline-primary" style="float: right"><i class="icon fa fa-plus" title="Tambah"></i></a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Gambar</th>
                            <th>Deskripsi</th>
                            <th>Harga</th>
                            <th>Stok</th>
                            <th>Tanggal</th>
                            <th style="width:10%;">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; ?>
                        @foreach ($barang as $data)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $data->nama }}</td>
                            <td><img src="{{ url('foto/barang/' . $data->gambar) }}" width="100px;cursor:pointer" height="100px" onclick="onClick(this)"></td>
                            <td>{{ $data->deskripsi }}</td>
                            <td>Rp.{{ number_format($data->harga, 0, ',', '.') }}</td>
                            <td>{{ $data->stok }}</td>
                            <td>{{ $data->tanggal }}</td>
                            <td colspan="2">
                                {{-- <a href="/barang/detail/{{ $data->id_brg }}" class="btn btn-sm btn-success">Detail</a> --}}
                                <a href="/barang/edit/{{ $data->id_brg }}" class="btn btn-warning"><i class="icon fa fa-edit" title="Edit"></i></a>
                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete{{ $data->id_brg }}">
                                    <i class="icon fa fa-trash" title="Hapus"></i>
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

@foreach ($barang as $data)
<div class="modal modal-danger fade" id="delete{{ $data->id_brg }}">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title">{{ $data->nama }}</h2>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="float: left;">
                    X</button>
            </div>
            <div class="modal-body">
                <p>Apakah anda yakin ingin menghapus barang ini?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">No</button>
                <a href="/barang/delete/{{ $data->id_brg }}" class="btn btn-outline">Yes</a>
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
    $(function() {
        $("#example1").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "buttons": ["colvis"]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });
    });
</script>

{{-- Modal Image --}}
<script>
    function onClick(element) {
        document.getElementById("img01").src = element.src;
        document.getElementById("modal01").style.display = "block";
    }
</script>

<!-- Menghilangkan Modal -->
<script>
  window.setTimeout(function() {
    $(".alert").fadeTo(500, 0).slideUp(500, function(){
      $(this).remove(); 
    });
  }, 3000);
</script>
@endsection
