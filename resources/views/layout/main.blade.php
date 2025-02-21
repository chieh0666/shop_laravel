<!DOCTYPE html>
<html lang="zh-tw">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>二手商鋪@yield('title')</title>
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
    <script src="/js/component.js"></script>
</body>
</html>