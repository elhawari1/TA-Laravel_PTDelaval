@extends('layout_user.v_template')

@section('content')
<div class="container-fluid">
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="4"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <a href="https://api.whatsapp.com/send?phone=6281326191370&text=Saya%20ingin%20konsultasi." style="width: 100px; border-radius: 50px" target="_blank"><img src="{{ asset('template_user') }}/images/slide 5.png" class="d-block w-100" alt="..."> </a>
            </div>
            <div class="carousel-item">
                <img src="{{ asset('template_user') }}/images/slide 2.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="{{ asset('template_user') }}/images/slide 3.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="{{ asset('template_user') }}/images/slide 4.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="{{ asset('template_user') }}/images/slide 1.jpg" class="d-block w-100" alt="...">
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div><br>
    <div class="row no-gutters slider-text align-items-center justify-content-center">
        <div class="col-md-9 ftco-animate text-center">
            <form action="/pt_delaval/barang" method="GET">
                @csrf
                <div class="input-group mb-3">
                    <input type="text" class="form-control" name="nama" placeholder="Cari Barang" aria-describedby="button-addon2">
                    <input type="hidden" name="route" value="produk">
                    <button class="btn btn-outline-primary" type="submit" id="button-addon2">
                        <span><i class="fa fa-search" aria-hidden="true"></i></span>
                    </button>
                </div>
            </form>
        </div>
    </div>
    <div class="ml-5">
        <div class="row text-center mt-4">
            @foreach ($barang as $data)
            <div class="card ml-3 mb-3" style="width: 18rem;">
                <img src="{{ url('foto/barang/' . $data->gambar) }}" class="card-img-top" alt="..." width="100px" height="250px">
                <div class="card-body">
                    <span class="card-title ml-4">{{ $data->nama }}</span>
                    <span class="badge badge-success mb-2">Rp.{{ number_format($data->harga, 0, ',', '.') }}</span>
                    @if ($data->stok != 0)
                            <p class="card-text">tersisa  {{ $data->stok }} buah</p>
                            @else
                            <strong class="card-text text-danger">Barang Habis</strong>
                    @endif
                </div>
                <div class="card-footer bg-transparent">
                    <div class="row">
                        <div class="col">
                            @if ($data->stok != 0)
                            <a href="/keranjang/tambah/{{ $data->id_brg }}" class="btn btn-sm btn-success" style="width: 100px; border-radius: 50px">Beli</a>
                            @else
                                <button class="btn btn-sm btn-success" style="width: 100px; border-radius: 50px" onclick="sweetAlert2()" disabled>Beli</button>
                            @endif
                        </div>
                        <div class="col">
                            <a href="/detail/barang/{{ $data->id_brg }}" class="btn btn-sm btn-warning" style="width: 100px; border-radius: 50px">Detail</a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="row mt-5">
            {{ $barang->links('pagination::bootstrap-4') }}
        </div>
    </div>
</div>
@endsection
