@extends('layout_admin.v_template')
@section('title','Dashboard')

@section('content')

<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Dashboard</h1><br>
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
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3><?php $b = 0; ?>
                            @foreach($barang as $a)
                            <?php $b++; ?>
                            @endforeach
                            {{$b}}
                        </h3>
                        <p>Barang</p>
                    </div>
                    <div class="icon">
                        <i class="acon fa fa-box"></i>
                    </div>
                    <a href="/barang" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-primary">
                    <div class="inner">
                        <h3><?php $b = 0; ?>
                            @foreach($pesanan as $a)
                            <?php $b++; ?>
                            @endforeach
                            {{$b}}
                        </h3>
                        <p>Pesanan</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-file-invoice-dollar"></i>
                    </div>
                    <a href="/pesanan" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-success">
                    <div class="inner">
                        <h3><?php $b = 0; ?>
                            @foreach($komentar as $a)
                            <?php $b++; ?>
                            @endforeach
                            {{$b}}
                        </h3>
                        <p>Komentar</p>
                    </div>
                    <div class="icon">
                        <i class="acon fa fa-comments"></i>
                    </div>
                    <a href="/komentar" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>

            <!-- ./col -->
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-danger">
                  <div class="inner">
                      <h3><?php $b = 0; $c=0; ?>
                          @foreach($pesananBelumBayar as $a)
                          <?php $b++; ?>
                          @endforeach
                          @foreach($pesanan as $a)
                          <?php $c++; ?>
                          @endforeach
                          {{$b}}
                      </h3>
                      <p>Pesanan yang belum dibayar</p>
                  </div>
                  <div class="icon">
                      <i class="acon fa fa-file-invoice-dollar"></i>
                  </div>
                  <a href="/pesanan" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
          </div>
        </div>
        <!-- /.row -->
        <!-- Main row -->
    </div><!-- /.container-fluid -->
</section>

@endsection
