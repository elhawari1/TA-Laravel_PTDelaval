@extends('layout_user.v_template')
@section('title','Contact')
@section('content')

<div class="hero-wrap hero-bread" style="background-image: url('{{ asset('template_user') }}/images/delaval.png');">
</div><br>
<div class="container">
  <div class="row no-gutters slider-text align-items-center justify-content-center">
    <div class="col-md-9 ftco-animate text-center">
      <p class="breadcrumbs"><span class="mr-2"><a href="/pt_delaval">
            <font color="blue">Home
          </a></font></span> <span>
          <h1 class="mb-0 bread font-weight-bold">
            <font color="black">Kontak Kami
          </h1>
    </div>
  </div>
</div>

<section class="ftco-section">
  <div class="container">
    <div class="row no-gutters ftco-services">
      <div class="col-md-3 text-center d-flex align-self-stretch ftco-animate">
        <div class="media block-6 services mb-md-0 mb-4">
          <div style="background-color:#e7e4ee" class="icon active d-flex justify-content-center align-items-center mb-2">
            <i class="fas fa-map-marker-alt fa-3x"></i>
          </div>
          <div class="media-body">
            <h3 class="heading">Alamat</h3>
            <span>Perum Bukit Hijau Blok B-Kav.39,Jalan Raya Tlogomas, Kec. Lowokwaru, Kota Malang, Jawa Timur 65144</span>
          </div>
        </div>
      </div>
      <div class="col-md-3 text-center d-flex align-self-stretch ftco-animate">
        <div class="media block-6 services mb-md-0 mb-4">
          <div style="background-color:#e7e4ee" class="icon d-flex justify-content-center align-items-center mb-2">
            <i class="fas fa-phone fa-3x"></i>
          </div>
          <div class="media-body">
            <h3 class="heading"> Telepon</h3>
            <span>0341-5535-15</span>
          </div>
        </div>
      </div>
      <div class="col-md-3 text-center d-flex align-self-stretch ftco-animate">
        <div class="media block-6 services mb-md-0 mb-4">
          <div style="background-color:#e7e4ee" class="icon d-flex justify-content-center align-items-center mb-2">
            <i class="fas fa-envelope-open-text fa-3x"></i>
          </div>
          <div class="media-body">
            <h3 class="heading"> Email</h3>
            <span>info@delaval-indonesia.com</span>
          </div>
        </div>
      </div>
      <div class="col-md-3 text-center d-flex align-self-stretch ftco-animate">
        <div class="media block-6 services mb-md-0 mb-4">
          <div style="background-color:#e7e4ee" class="icon d-flex justify-content-center align-items-center mb-2">
            <i class="fab fa-instagram fa-3x"></i>
          </div>
          <div class="media-body">
            <h3 class="heading">Instagram</h3>
            <span>@delavalmalang</span>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="ftco-section contact-section bg-light">
  <div class="container">
    <div class="row block-9">
      <div class="col-md-6 order-md-last d-flex">
        <form action="/kontak/insert" method="POST" enctype="multipart/form-data" class="bg-white p-5 contact-form">
            @csrf
          <div class="form-group">
            <input type="text" name="nama" class="form-control" placeholder="Nama Anda">
          </div>
          <div class="form-group">
            <input type="text" name="email" class="form-control" placeholder="Email Anda">
          </div>
          <div class="form-group">
            <input type="text" name="telepon" class="form-control" placeholder="Telepon">
          </div>
          <div class="form-group">
            <textarea type="text"name="pesan" cols="30" rows="7" class="form-control" placeholder="Pesan Anda"></textarea>
          </div>
          <div class="form-group">
            <button class="btn btn-primary btn-sm">Kirim Pesan</button>
          </div>
        </form>
      </div>
      <div class="col-md-6 d-flex">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3951.6763924027964!2d112.59994311407603!3d-7.92882769428862!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e78821ef791cf69%3A0xa6e62980c560a9b5!2sDelaval%20Indonesia%20(Agri%20Servis%20Sakti.%20PT)!5e0!3m2!1sen!2sid!4v1619773876914!5m2!1sen!2sid" width="800" height="600" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
      </div>
    </div>
  </div>
</section>
@endsection
