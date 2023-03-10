<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    @yield('meta_tags')
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('theme/default/theme/default/img/favicon.png')}}">
    <link rel="stylesheet" href="{{asset('theme/default/css/normalize.css')}}">
    <link rel="stylesheet" href="{{asset('theme/default/css/main.css')}}">
    <link rel="stylesheet" href="{{asset('theme/default/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('theme/default/css/fontawesome-all.min.css')}}">
    <link rel="stylesheet" href="{{asset('theme/default/font/flaticon.css')}}">
    <link rel="stylesheet" href="{{asset('theme/default/css/animate.min.css')}}">
    <link rel="stylesheet" href="{{asset('theme/default/css/meanmenu.min.css')}}">
    <link rel="stylesheet" href="theme/default/vendor/OwlCarousel/owl.carousel.min.css">
    <link rel="stylesheet" href="theme/default/vendor/OwlCarousel/owl.theme.default.min.css">
    <link rel="stylesheet" href="{{asset('theme/default/style.css')}}">
    <script src="{{asset('theme/default/js/modernizr-3.6.0.min.js')}}"></script>
</head>
<body class="sticky-header">
    <div id="preloader"></div>
    <div id="wrapper" class="wrapper">
        @include('theme/'.env('SITE_THEME').'/partials/header')
           @yield('content')
        {{--@include('theme/'.env('SITE_THEME').'/partials/social')--}}
        @include('theme/'.env('SITE_THEME').'/partials/footer')
        @include('theme/'.env('SITE_THEME').'/partials/search_box')
    </div>
    <script src="{{asset('theme/default/js/jquery-3.3.1.min.js')}}"></script>
    <script src="{{asset('theme/default/js/plugins.js')}}"></script>
    <script src="{{asset('theme/default/js/popper.min.js')}}"></script>
    <script src="{{asset('theme/default/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('theme/default/vendor/OwlCarousel/owl.carousel.min.js')}}"></script>
    <script src="{{asset('theme/default/js/jquery.meanmenu.min.js')}}"></script>
    <script src="{{asset('theme/default/js/main.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios@1.1.2/dist/axios.min.js"></script>
    @stack('custom-scripts')
</body>
</html>
