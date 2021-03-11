@extends('template')
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Masuk ke Dashboard | Sistem Pencatatan Bengkel</title>
</head>

<body>
    <div class="login-clean">
        <form method="POST" action="{{ url('login') }}">
            @csrf
            <h2 class="sr-only">Login</h2>
            <div class="illustration"><i class="icon ion-ios-navigate" style="color: rgb(40,45,50);"></i></div>
            <div class="form-group"><input class="form-control" type="email" name="email" placeholder="Email"></div>
            <div class="form-group"><input class="form-control" type="password" name="password" placeholder="Password"></div>
            <div class="form-group">
                <button class="btn btn-success btn-block" type="submit"><i class="fa fa-sign-in"></i> Masuk</button>
                <button class="btn btn-warning btn-block" href="{{ url('/') }}"><i class="fa fa-home"></i> Kembali ke laman awal</button>
            </div><a href="#" class="forgot">Lupa Password ?</a></form>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>