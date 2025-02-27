<!DOCTYPE html>
<html lang="zh-tw">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')二手商鋪</title>
    <link rel="shortcut icon" href="/images/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="/assets/bootstrap-5.3.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="/assets/fonts/bootstrap-icons-1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="/assets/js/ui-main/dist/carousel/carousel.css">
    <link rel="stylesheet" href="/assets/js/ui-main/dist/carousel/carousel.autoplay.css">
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/media.css">
</head>
<body @if (Route::currentRouteName() == 'home') id="home" @endif>
    @include('layout.header')
    <main>
        <div class="container">
            @yield('main-content')
        </div>
    </main>
    @include('layout.footer')
    <script src="/assets/js/jquery-3.7.1.min.js"></script>
    <script src="/assets/bootstrap-5.3.3/js/bootstrap.bundle.min.js"></script>
    <script src="/assets/js/sweetalert2-11.17.2.js"></script>
    <script src="/assets/js/ui-main/dist/carousel/carousel.umd.js"></script>
    <script src="/assets/js/ui-main/dist/carousel/carousel.autoplay.umd.js"></script>
    <script src="/js/component.js"></script>
    @stack('scripts')
</body>
</html>