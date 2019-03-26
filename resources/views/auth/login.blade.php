<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Created by Moch Diki Widianto, Powered By Bootstrap and Laravel">
    <meta name="author" content="Moch Diki Widianto">
    <meta name="generator" content="Jekyll v3.8.5">
    <title>Toko-KU</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('dist/css/bootstrap.css') }}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{ asset('dist/vendor/font-awesome/css/all.min.css') }}" rel="stylesheet">

    <style>
    .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
    }

    @media (min-width: 768px) {
        .bd-placeholder-img-lg {
            font-size: 3.5rem;
        }
    }
    </style>
    <!-- Custom styles for this template -->
    <link href="{{ asset('dist/css/custom/signin.css') }}" rel="stylesheet">
</head>
<body class="text-center">
    <form class="form-signin" method="POST" action="{{ route('login') }}" autocomplete="off">
        {{ csrf_field() }}
        <h1 class="h3 mb-3 font-weight-normal" style="font-family:'Tokoku'; color:cornsilk">Toko-KU</h1>
        <label for="inputEmail" class="sr-only">Email</label>
        <input id="inputEmail" type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Masukkan Email Anda" required autofocus>
        <label for="inputPassword" class="sr-only">Kata Sandi</label>
        <input id="inputPassword" type="password" class="form-control" name="password" placeholder="Masukkan Kata Sandi Anda" required>
        <div class="checkbox mb-3">
            <label>
                <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> <span style="color:cornsilk">Remember Me</span>
            </label>
        </div>
        <button class="btn btn-lg btn-primary btn-block" type="submit"><span class="fa fa-sign-in-alt"></span> Masuk</button>
        <p class="mt-5 mb-3 text-muted" style="color:cornsilk">&copy; 2019 by @dikiwidia</p>
    </form>
</body>
</html>
