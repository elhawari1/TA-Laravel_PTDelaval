@extends('layout_user.v_template')
@section('title','Produk')
@section('content')
<div class="hero-wrap hero-bread" style="background-image: url('{{ asset('template_user') }}/images/delaval.png');">
</div><br>
<div class="row no-gutters slider-text align-items-center justify-content-center">
  <div class="col-md-9 ftco-animate text-center">
    <p class="breadcrumbs"><span class="mr-2"><a href="/pt_delaval">
          <font color="blue">Home</font>
        </a></span>
    <h1 class="mb-0 bread font-weight-bold">Produk Kami</h1>
  </div>
  <div style="margin-top: 20px;">
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
    <div class="card ml-2 mb-3" style="width: 18rem;">
      <img src="{{ url('foto/barang/' . $data->gambar) }}" class="card-img-top" alt="..." width="100px" height="250px">
      <div class="card-body">
        <span class="card-title ml-4">{{ $data->nama }}</span>
        <span class="badge badge-success mb-3">Rp.{{ number_format($data->harga, 0, ',', '.') }}</span>
        <p class="card-text">{{ $data->deskripsi }}</p>
      </div>
      <div class="card-footer bg-transparent">
        <div class="row">
          <div class="col">
            @if ($data->stok != 0)
            <a href="/keranjang/tambah/{{ $data->id_brg }}" class="btn btn-sm btn-success" style="width: 100px; border-radius: 50px" onclick="sweetAlert1()">Beli</a>
            @else

            <a href="" class="btn btn-sm btn-success" style="width: 100px; " onclick="sweetAlert2()">Beli</a>
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
    {{$barang->links("pagination::bootstrap-4")}}
  </div>
</div>

@endsection