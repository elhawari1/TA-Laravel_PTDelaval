@extends('layout_user.v_template')
@section('content')
<div class="container">
    <div class="box-header">
        <h3 class="box-title">Pembayaran</h3>
    </div>
    <?php
    $subtotal = 0;
    $keranjang = session()->get('tambah_keranjang');

    foreach (session('tambah_keranjang') as $cart) :
        $barang = DB::table('tbl_barang')
            ->where('id_brg', $cart['id_brg'])
            ->first();

        $subtotal += $barang->harga * $cart['jumlah'];
    endforeach;
    echo '<h4>Total Belanja Anda: Rp. ' . number_format($subtotal, 0, ',', '.');
    ?>
    <div class="card-body">
        <form action="/pembayaran/insert" method="post">
            @csrf
            <h6>Nama</h6>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text"><span class="fa fa-user"></span></span>
                </div>
                <input type="number" name="total" id="total" value="{{ $subtotal }}" hidden>
                <input type="text" name="nama" placeholder="Nama Lengkap" value="{{ Auth::user()->name }}" class="form-control" readonly>
            </div>

            <h6>Alamat Lengkap</h6>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text"><span class="fa fa-home"></span></span>
                </div>
                <input type="text" name="alamat" placeholder="Alamat Lengkap" class="form-control" value="{{ old('alamat') }}">
                <div class="text-danger">
                    @error('alamat')
                    {{ $message }}
                    @enderror
                </div>
            </div>

            <div class="form-row">
            <div class="col">
            <h6>No Telpon</h6>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text"><span class="fa fa-phone"></span></span>
                </div>
                <input type="number" name="no_telpon" placeholder="No Telpon" class="form-control" maxlength="13x" value="{{ old('no_telpon') }}">
                <div class="text-danger">
                    @error('no_telpon')
                    {{ $message }}
                    @enderror
                </div>
            </div>
            </div>

            <div class="col">
            <h6>Kode Pos</h6>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text"><span class="fa fa-map-marker"></span></span>
                </div>
                <input type="number" name="kode_pos" placeholder="Kode Pos" class="form-control" value="{{ old('kode_pos') }}">
                 <div class="text-danger">
                    @error('kode_pos')
                    {{ $message }}
                    @enderror
                </div>
            </div>

            </div>
            </div>

            <div class="form-row">
                <div class="col">
                    <h6>Kecamatan</h6>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><span class="fa fa-location-arrow"></span></span>
                        </div>
                        <input type="text" name="kecamatan" placeholder="Kecamatan" class="form-control" value="{{ old('kecamatan') }}">
                         <div class="text-danger">
                            @error('kecamatan')
                            {{ $message }}
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="col">
                    <h6>Kelurahan</h6>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><span class="fa fa-location-arrow"></span></span>
                        </div>
                        <input type="text" name="kelurahan" placeholder="Kelurahan" class="form-control" value="{{ old('kelurahan') }}">
                         <div class="text-danger">
                            @error('kelurahan')
                            {{ $message }}
                            @enderror
                        </div>
                    </div>
                </div>
            </div>

            <h6>Kota/Kabupaten</h6>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text"><span class="fa fa-building"></span></span>
                </div>
                <input type="text" name="koten" placeholder="Kota / Kabupaten" class="form-control" value="{{ old('koten') }}">
                <div class="text-danger">
                    @error('koten')
                    {{ $message }}
                    @enderror
                </div>
            </div>

            <div align="right">
                <a href="/keranjang">
                    <div class="btn btn-danger" style="width: 100px; border-radius: 50px">Kembali</div>
                </a>
                <button type="submit" class="btn btn-primary" style="width: 230px; border-radius: 50px">
                    Konfirmasi Pembayaran
                </button>
            </div>

        </form>
    </div>
</div>
@endsection
