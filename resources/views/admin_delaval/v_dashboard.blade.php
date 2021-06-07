@extends('layout_admin.v_template')
@section('title','Dashboard')

@section('content')

<style>
  #watch {
    color: black;
    position: relative;
    height: 2em;
    width: 3.8em;
    margin: auto;
    top: 0;
    left: 0;
    bottom: 0;
    right: 0;
    font-size: 30px;
    float: left;
  }
</style>

<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Dashboard</h1><br>
        <div id="watch"></div>
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

<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script type="text/javascript">
  $(document).ready(function() {
    function clock() {
      var now = new Date();
      var secs = ('0' + now.getSeconds()).slice(-2);
      var mins = ('0' + now.getMinutes()).slice(-2);
      var hr = now.getHours();
      var Time = hr + ":" + mins + ":" + secs;
      document.getElementById("watch").innerHTML = Time;
      requestAnimationFrame(clock);
    }

    requestAnimationFrame(clock);
  });
</script>

@endsection