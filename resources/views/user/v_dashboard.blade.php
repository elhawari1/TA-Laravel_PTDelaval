@extends('layout_user.v_template')
@section('title','')

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
        <img src="{{ asset('template_user') }}/images/slide 5.png" class="d-block w-100" alt="...">
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

  <div class="row text-center mt-4">
  @foreach ($barang as $data)
  <div class="card ml-3 mb-3" style="width: 18rem;">
    <img src="{{ url('foto/barang/' . $data->gambar) }}" class="card-img-top" alt="...">
    <div class="card-body">
      <h5 class="card-title">{{ $data->nama }}</h5>
      <span class="badge badge-success mb-3">Rp. {{ number_format($data->harga, 0, ',','.') }}</span>
      <p class="card-text">{{ $data->deskripsi }}</p>
      <a href="/keranjang/tambah/{{ $data->id_brg }}" class="btn btn-sm btn-success">Tambah Keranjang</a>
      <a href="/detail/barang/{{ $data->id_brg }}" class="btn btn-sm btn-warning">Detail</a>
    </div>
  </div>
  @endforeach
    </div>
</div>
@endsection
