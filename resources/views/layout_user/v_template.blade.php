<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="icon" type="image/jpg" href="{{ asset('template_user') }}/images/logo_dairyfarm.jpg">
    <title>PT Delaval | @yield('title')</title>

    {{-- ALert --}}
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet"></link>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.33.1/sweetalert2.min.css" rel="stylesheet"></link>
    <link crossorigin="anonymous" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" rel="stylesheet"></link>

    {{-- untuk file input barang --}}
    <link rel="stylesheet"  
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.1.5/css/fileinput.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.1.2/css/fileinput.min.css" media="all"
        rel="stylesheet" type="text/css" />

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <script src="https://kit.fontawesome.com/6773869ded.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800&display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lora:400,400i,700,700i&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Amatic+SC:400,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('template_user') }}/css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('template_user') }}/css/animate.css">

    <link rel="stylesheet" href="{{ asset('template_user') }}/css/owl.carousel.min.css">
    <link rel="stylesheet" href="{{ asset('template_user') }}/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="{{ asset('template_user') }}/css/magnific-popup.css">

    <link rel="stylesheet" href="{{ asset('template_user') }}/css/aos.css">

    <link rel="stylesheet" href="{{ asset('template_user') }}/css/ionicons.min.css">

    <link rel="stylesheet" href="{{ asset('template_user') }}/css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="{{ asset('template_user') }}/css/jquery.timepicker.css">


    <link rel="stylesheet" href="{{ asset('template_user') }}/css/flaticon.css">
    <link rel="stylesheet" href="{{ asset('template_user') }}/css/icomoon.css">
    <link rel="stylesheet" href="{{ asset('template_user') }}/css/style.css">

</head>

<body class="goto-here">
    <div class="py-1 bg-primary">
        <div class="container">
            <div class="row no-gutters d-flex align-items-start align-items-center px-md-0">
                <div class="col-lg-12 d-block">
                    <div class="row d-flex">
                        <div class="col-md pr-4 d-flex topper align-items-center">
                            <div class="icon mr-2 d-flex justify-content-center align-items-center"><span
                                    class="icon-phone2"></span></div>
                            <span class="text">0341-5535-15</span>
                        </div>
                        <div class="col-md pr-4 d-flex topper align-items-center">
                            <div class="icon mr-2 d-flex justify-content-center align-items-center"><span
                                    class="icon-paper-plane"></span></div>
                            <span class="text">info@delaval-indonesia.com</span>
                        </div>
                        <div class="col-md-5 pr-4 d-flex topper align-items-center text-lg-right">
                            <span class="text">Perum Bukit Hijau Blok B-Kav.39,Jalan Raya Tlogomas</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('layout_user.v_navheader')

    @yield('content')

    @include('layout_user.v_footer')



    <!-- loader -->
    <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px">
            <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" />
            <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10"
                stroke="#F96D00" />
        </svg></div>


    <script src="{{ asset('template_user') }}/js/jquery.min.js"></script>
    <script src="{{ asset('template_user') }}/js/jquery-migrate-3.0.1.min.js"></script>
    <script src="{{ asset('template_user') }}/js/popper.min.js"></script>
    <script src="{{ asset('template_user') }}/js/bootstrap.min.js"></script>
    <script src="{{ asset('template_user') }}/js/jquery.easing.1.3.js"></script>
    <script src="{{ asset('template_user') }}/js/jquery.waypoints.min.js"></script>
    <script src="{{ asset('template_user') }}/js/jquery.stellar.min.js"></script>
    <script src="{{ asset('template_user') }}/js/owl.carousel.min.js"></script>
    <script src="{{ asset('template_user') }}/js/jquery.magnific-popup.min.js"></script>
    <script src="{{ asset('template_user') }}/js/aos.js"></script>
    <script src="{{ asset('template_user') }}/js/jquery.animateNumber.min.js"></script>
    <script src="{{ asset('template_user') }}/js/bootstrap-datepicker.js"></script>
    <script src="{{ asset('template_user') }}/js/scrollax.min.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false">
    </script>
    <script src="{{ asset('template_user') }}/js/main.js"></script>
    </script src="https://kit.fontawesome.com/e795435e96.js" crossorigin="anonymous">
    </script>

    {{-- untuk file input barang --}}
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.1.5/js/fileinput.min.js"></script>

    {{-- ALert --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.33.1/sweetalert2.min.js"></script>

    <script type="text/javascript">
    function sweetAlert()
    {
    Swal.fire(
    'Terimakasih Telah Melakukan Pemesanan',
    '',
    'success'
    )
    }
    </script>
    <script type="text/javascript">
    function sweetAlert1()
    {
    Swal.fire(
    '',
    'Produk Telah Ditambahkan Ke Keranjang Belanja',
    'success'
    )
    }
    </script>

</body>

</html>
