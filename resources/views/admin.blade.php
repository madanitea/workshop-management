<!DOCTYPE html>
<html>
<head>
	<title>{{ $halaman }} | Sistem Pencatatan Bengkel</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE-edge">
	<meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- <link rel="stylesheet" type="text/css" href="{{ asset('MDBootstrap/css/mdb.min.css') }}"> -->
	<link rel="stylesheet" type="text/css" href="{{ asset('fonts/font-awesome.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('fonts/ionicons.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/Footer-Dark.css') }}">
    <link rel="stylesheet" href="{{ asset('css/Login-Form-Clean.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/styles.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/Highlight-Clean.css') }}">
    <link rel="stylesheet" href="{{ asset('css/Navigation-with-Button.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/dataTables.bootstrap4.min.css') }}">
	{{-- INI UNTUK MEMANGGIL BOOTSTRAP --}}
</head>

<body>
    <nav class="navbar navbar-dark bg-dark navbar-expand-md navigation-clean-button sticky-top shadow border-bottom border-warning">
            <div class="container">
                <a class="navbar-brand" href="#" style="color: rgb(244,160,0);">Sistem Pencatatan Bengkel</a><button class="navbar-toggler" data-toggle="collapse" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
                <div
                    class="collapse navbar-collapse" id="navcol-1">
                    <ul class="nav navbar-nav mr-auto">
                        @if (!empty($halaman) && $halaman == "Dashboard")
                        <li class="nav-item" role="presentation"><a class="nav-link active" href="{{ url('dashboard') }}">Dashboard</a></li>
                        @else
                        <li class="nav-item" role="presentation"><a class="nav-link" href="{{ url('dashboard') }}">Dashboard</a></li>
                        @endif
                        <li class="dropdown nav-item"><a class="dropdown-toggle nav-link" data-toggle="dropdown" aria-expanded="false" href="#">Riwayat</a>
                            <div class="dropdown-menu" role="menu">
                                <a class="dropdown-item" role="presentation" href="{{ url('riwayat/servis') }}">Riwayat Servis</a>
                                <a class="dropdown-item" role="presentation" href="{{ url('riwayat/penjualan') }}">Riwayat Penjualan</a>
                            </div>
                        </li>
                        <li class="dropdown nav-item">
                            <a class="dropdown-toggle nav-link" data-toggle="dropdown" aria-expanded="false" href="#">Suku Cadang</a>
                            <div class="dropdown-menu" role="menu">
                                @if (!empty($halaman) && $halaman == "Data Suku Cadang")
                                <a class="dropdown-item active" role="presentation" href="{{ url('sparepart') }}">Data Suku Cadang</a>
                                @else
                                <a class="dropdown-item" role="presentation" href="{{ url('sparepart') }}">Data Suku Cadang</a>
                                @endif
                                @if (!empty($halaman) && $halaman == "Tambah Suku Cadang")
                                <a class="dropdown-item active" role="presentation" href="{{ url('sparepart/tambah') }}">Tambah Suku Cadang</a>
                                @else
                                <a class="dropdown-item" role="presentation" href="{{ url('sparepart/tambah') }}">Tambah Suku Cadang</a>
                                @endif
                            </div>
                        </li>
                        <li class="dropdown nav-item"><a class="dropdown-toggle nav-link" data-toggle="dropdown" aria-expanded="false" href="#">Peralatan</a>
                            <div class="dropdown-menu" role="menu">
                                @if (!empty($halaman) && $halaman == "Data Alat")
                                <a class="dropdown-item active" role="presentation" href="{{ url('tools') }}">Data Peralatan</a>
                                @else
                                <a class="dropdown-item" role="presentation" href="{{ url('tools') }}">Data Peralatan</a>
                                @endif
                                @if (!empty($halaman) && $halaman == "Tambah Alat")
                                <a class="dropdown-item active" role="presentation" href="{{ url('tools/tambah') }}">Tambah Peralatan</a>
                                @else
                                <a class="dropdown-item" role="presentation" href="{{ url('tools/tambah') }}">Tambah Peralatan</a>
                                @endif
                            </div>
                        </li>
                    </ul><span class="navbar-text actions"> <a class="btn btn-light action-button" role="button" href="{{ url('/') }}" style="background-color: rgb(244,160,0);">Keluar</a></span></div>
            </div>
    </nav>
	<div class="container">
		@yield('main')
	</div>
    <div class="footer-dark">
        <footer>
            <div class="container">
                <div class="row">
                    <div class="col-sm-6 col-md-3 item">
                        <h3 style="color: rgb(244,160,0);">Layanan</h3>
                        <ul>
                            <li><a href="#">Graphic Design</a></li>
                            <li><a href="#">Web Design</a></li>
                            <li><a href="#">App Development</a></li>
                            <li><a href="#">IT Consultant</a></li>
                            <li><a href="#">Networking</a></li>
                        </ul>
                    </div>
                    <div class="col-sm-6 col-md-3 item">
                        <h3 style="color: rgb(244,160,0);">Tentang Aplikasi</h3>
                        <ul>
                            <li><a href="">Perusahaan : Madani IT Solution</a></li>
                            <li><a href="">Versi : 1.1 (beta)</a></li>
                            <li><a href="">Lisensi : Permanen</a></li>
                            <li><a href="">Nama Aplikasi : Sistem Pencatatan Bengkel</a></li>
                        </ul>
                    </div>
                    <div class="col-md-6 item text">
                        <h3 style="color: rgb(244,160,0);">Alamat Kantor</h3>
                        <p>Jl. Cihanjuang KM 2 no.67, Cihanjuang, Parongpong, Kabupaten Bandung Barat.</p>
                    </div>
                    <div class="col item social">
                        <i class="btn ion-social-facebook"></i>
                        <i class="btn ion-social-twitter"></i>
                        <i class="btn ion-social-snapchat"></i>
                        <i class="btn ion-social-instagram"></i>
                    </div>
                </div>
                <p class="copyright">Madani IT Solution © 2019</p>
            </div>
        </footer>
    </div>
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/bs-animation.js') }}"></script>
    <script src="{{ asset('MDBootstrap/js/mdb.min.js') }}"></script>
    <script src="{{ asset('js/auto-dismiss/bootstrap-auto-dismiss-alert.js') }}"></script>
    <script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('js/dataTables.bootstrap4.min.js') }}"></script>
    @yield('script')
</body>
</html>