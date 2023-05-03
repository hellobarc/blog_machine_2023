<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="_token" content="{{ csrf_token() }}">
    @yield('meta_tags')
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    {{-- <link rel="shortcut icon" type="image/x-icon" href="{{asset('theme/default/theme/default/img/favicon.png')}}"> --}}
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('images/logo.png')}}">
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
        @include('theme/'.env('SITE_THEME').'/partials/login-modal')
    </div>
    <script src="{{asset('theme/default/js/jquery-3.3.1.min.js')}}"></script>
    <script src="{{asset('theme/default/js/plugins.js')}}"></script>
    <script src="{{asset('theme/default/js/popper.min.js')}}"></script>
    <script src="{{asset('theme/default/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('theme/default/vendor/OwlCarousel/owl.carousel.min.js')}}"></script>
    <script src="{{asset('theme/default/js/jquery.magnific-popup.min.js')}}"></script>
    <script src="{{asset('theme/default/js/jquery.counterup.min.js')}}"></script>
    <script src="{{asset('theme/default/js/jquery.waypoints.min.js')}}"></script>
    <script src="{{asset('theme/default/js/jquery.meanmenu.min.js')}}"></script>
    <script src="{{asset('theme/default/js/jquery.smoothscroll.min.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        var config = {
        routes: {
            zone: "{{ route('custom.login') }}",
            registration: "{{route('custom.register')}}",
        }
    };
    </script>
    <script src="{{asset('js/front/login-modal.js')}}"></script>
    {{-- custom script for details start --}}
    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> --}}
{{-- <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script> --}}

    {{-- custom script for details end --}}
    <script src="{{asset('theme/default/js/main.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios@1.1.2/dist/axios.min.js"></script>
    @stack('custom-scripts')
</body>
</html>
