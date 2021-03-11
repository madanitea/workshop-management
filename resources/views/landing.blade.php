@extends('template')
<title>Bengkel</title>
    <nav class="navbar navbar-light navbar-expand-md navigation-clean-search sticky-top">
        <div class="container"><a class="navbar-brand" href="#" style="color: rgb(244,160,0);">Sistem Pencatatan Bengkel</a><button class="navbar-toggler" data-toggle="collapse" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navcol-1">
                <ul class="nav navbar-nav">
                    <li class="nav-item" role="presentation"><a class="nav-link" href="#">Beranda</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="#tentang">Tentang</a></li>
                </ul>
            </div>
            <a class="btn btn-light action-button" role="button" href="{{ url('login') }}" style="background-color: rgb(244,160,0);">Masuk </a>
        </div>
    </nav>
    <div data-bs-parallax-bg="true" style="height:500px;background-image:url({{ asset('img/parallax.jpg') }});background-position:center;background-size:cover;">
    </div>
    <div>
        <div class="container" id="tentang">
            <div class="row">
                <div class="col-md-6 col-lg-4"></div>
                <div class="col-md-6 col-lg-8">
                    <br><br><h4><b>Apa itu bengkel ?</b></h4>
                    <p class="text-justify"><strong>Bengkel</strong>&nbsp;adalah tempat (bangunan atau ruangan) untuk perawatan / pemeliharaan, perbaikan, modifikasi alat dan mesin, tempat pembuatan bagian mesin dan perakitan alsin.&nbsp;<strong>Bengkel</strong>&nbsp;(pertanian)
                        memiliki 2 pengertian, yaitu secara luas dan secara sempit.<br><br></p>
                </div>
            </div>
        </div>
    </div>
    <div>
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-lg-4"></div>
                <div class="col-md-6 col-lg-8">
                    <h4><b>Apa itu Sistem Pecatatan Bengkel ?</b></h4>
                    <p class="text-justify"><b>Sistem Pencatatan Bengkel</b> merupakan aplikasi berbasis web yang dapat membantu admin bengkel dalam melakukan pencatatan suku cadang, penjualan, servis, dan lain sebagainya. Aplikasi ini juga memberikan visualisasi data tentang pendapatan, pencapaian, dan juga aset bengkel.</p>
                </div>
            </div>
        </div>
    </div>
    <div>
        <div class="container" id="tentang">
            <div class="row">
                <div class="col-md-6 col-lg-4"></div>
                <div class="col-md-6 col-lg-8">
                    <br>    <h4><b>Apa saja fitur yang dimiliki ?</b></h4>
                    <p class="text-justify">
                        <ul>
                            <li>Pencatatan Servis</li>
                            <li>Pencatatan Penjualan</li>
                            <li>Manajemen Suku Cadang</li>
                            <li>Manajemen Peralatan</li>
                            <li>Statistik pendapatan harian dan bulanan</li>
                        </ul>
                    <br><br></p>
                </div>
            </div>
        </div>
    </div>