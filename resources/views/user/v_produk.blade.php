@extends('layout_user.v_template')
@section('title','Produk')
@section('content')
<div class="hero-wrap hero-bread" style="background-image: url('{{ asset('template_user') }}/images/delaval.png');">
</div><br>
<div class="container">
  <div class="row no-gutters slider-text align-items-center justify-content-center">
    <div class="col-md-9 ftco-animate text-center">
      <p class="breadcrumbs"><span class="mr-2"><a href="/pt_delaval">
            <font color="blue">Home</font>
          </a></span>
      <h1 class="mb-0 bread font-weight-bold">Produk Kami</h1>
    </div>
  </div>
</div>

<section class="ftco-section">
  <div class="container">
    <div class="row">
      @foreach ($barang as $data)
      <div class="card ml-3 mb-3 mt-4" style="width: 18rem;">
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
    <div class="row mt-5">
      <div class="col text-center">
        <div class="block-27">
          <ul>
            <li><a href="#">&lt;</a></li>
            <li class="active"><span>1</span></li>
            <li><a href="#">2</a></li>
            <li><a href="#">3</a></li>
            <li><a href="#">4</a></li>
            <li><a href="#">5</a></li>
            <li><a href="#">&gt;</a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</section>

@endsection
