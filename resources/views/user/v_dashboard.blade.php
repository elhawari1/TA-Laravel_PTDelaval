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
  </div>
  <section class="ftco-section">
    <div class="ml-5">
      <div class="row text-center mt-4">
      @foreach ($barang as $data)
      <div class="card ml-3 mb-3" style="width: 18rem;">
        <img src="{{ url('foto/barang/' . $data->gambar) }}" class="card-img-top" alt="..." width="100px" height="250px">
        <div class="card-body">
          <h5 class="card-title">{{ $data->nama }}</h5>
          <span class="badge badge-success mb-3">Rp.{{ number_format($data->harga, 0, ',', '.') }}</span>
          <p class="card-text">{{ $data->deskripsi }}</p>
        </div>
        <div class="card-footer bg-transparent">
          <div class="row">
            <div class="col">
              @if ($data->stok != 0)
                  <a href="/keranjang/tambah/{{ $data->id_brg }}" class="btn btn-sm btn-success" style="width: 100px" onclick="sweetAlert1()" >Beli</a>
                @else

                  <a  href="" class="btn btn-sm btn-success" style="width: 100px; " onclick="sweetAlert2()" >Beli</a>
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
    </div>
</div>
</section>
@endsection
