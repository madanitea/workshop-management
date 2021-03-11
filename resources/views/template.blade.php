<!DOCTYPE html>
<html>
<head>
	<title>Sistem Pencatatan Bengkel</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE-edge">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<link rel="stylesheet" type="text/css" href="{{ asset('fonts/font-awesome.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('fonts/ionicons.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/Footer-Dark.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/Navigation-with-Search.css') }}">
    <link rel="stylesheet" href="{{ asset('css/Login-Form-Clean.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/Highlight-Clean.css') }}">
    <link rel="stylesheet" href="{{ asset('css/Map-Clean.css') }} ">
    <link rel="stylesheet" href="{{ asset('css/Navigation-with-Button.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/styles.css') }}">
	{{-- INI UNTUK MEMANGGIL BOOTSTRAP --}}
</head>

<body>
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
</body>
</html>