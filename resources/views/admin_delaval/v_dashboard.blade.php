@extends('layout_admin.v_template')
@section('title','Dashboard')

@section('content')
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Dashboard</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="/">Home</a></li>
          <li class="breadcrumb-item active">Dashboard</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <!-- Info boxes -->
    <div class="row">
      <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box">
          <span class="info-box-icon bg-info elevation-1"><i class="acon fa fa-box"></i></span>
          <div class="info-box-content">
            <span class="info-box-text">Jumlah barang</span>
            <span class="info-box-number">
              <?php
              $b = 0;
              ?>
              @foreach($barang as $a)
              <?php $b++; ?> 
              @endforeach
              {{$b}}
            </span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
      <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box">
          <span class="info-box-icon bg-success elevation-1"><i class="acon fa fa-comments"></i></span>
          <div class="info-box-content">
            <span class="info-box-text">Jumlah komentar</span>
            <span class="info-box-number">
              <?php
              $b = 0;
              ?>
              @foreach($komentar as $a)
              <?php $b++; ?> 
              @endforeach
              {{$b}}
            </span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
    </div><!-- /.container-fluid -->
</section>
@endsection

<style>
  .acon{
    font-style: normal;
  }
</style>