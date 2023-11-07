@php
    session()->flush();

    if (!session()->has('frontend')) {
        // Lấy info_companies
        $info = DB::table('info_companies')->first();

        // lấy menu
        $menus = DB::table('menus')->get();

        session(['frontend' => ['info_companies' => $info, 'menus' => $menus]]);
    }

    // Lấy thông tin công ty
    $info_companies = session()->get('frontend')['info_companies'];

@endphp

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @yield('title')
    @yield('meta')

    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1" />
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="robots" content="index, follow" />
    <meta http-equiv="Content-Language" content="vi" />
    <meta name="copyright" content="Copyright" />
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="DC.title" content="" />
    <meta property="og:url" content="http://www.mobifonekv4.vn" />
    <meta property="og:type" name="ogtype" content="Website" />
    <meta property="og:title" name="ogtitle" content="MobiFone kv4" />
    <meta property="og:sitename" content="{{ Request::fullUrl() }}" />
    <meta property="og:description" content="Công ty Dịch vụ MobiFone Kv4" />
    <meta property="og:image" content="{{ $info_companies->image_favicon_path }}" />
    <link rel="canonical" href="{{ Request::fullUrl() }}" />
    <link rel="shortcut icon" type="image/png" href="{{ $info_companies->image_favicon_path }}" />




    <link rel="stylesheet" href="{{ asset('frontEnd/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontEnd/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontEnd/css/slicknav.css') }}">
    <link rel="stylesheet" href="{{ asset('frontEnd/css/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontEnd/css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('frontEnd/css/fontawesome-all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontEnd/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('frontEnd/css/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('frontEnd/css/nice-select.css') }}">
    <link rel="stylesheet" href="{{ asset('frontEnd/css/style.css') }}">


    @yield('css-custom-frontend')
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        @include('frontEnd.partials.header')
        {{-- @include('partials.sidebar') --}}
        @yield('content')
        @include('frontEnd.partials.footer')
    </div>



    <script src="{{ asset('frontEnd/js/vendor/modernizr-3.5.0.min.js') }}"></script>
    <script src="{{ asset('frontEnd/js/vendor/jquery-3.6.3.min.js') }}"></script>
    {{-- <script src="{{ asset('frontEnd/js/vendor/jquery-1.12.4.min.js') }}"></script> --}}
    <script src="{{ asset('frontEnd/js/popper.min.js') }}"></script>
    <script src="{{ asset('frontEnd/js/bootstrap.min.js') }}"></script>

    <script src="{{ asset('frontEnd/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('frontEnd/js/slick.min.js') }}"></script>
    <script src="{{ asset('frontEnd/js/jquery.slicknav.min.js') }}"></script>
    <script src="{{ asset('frontEnd/js/countdown.min.js') }}"></script>

    <script src="{{ asset('frontEnd/js/wow.min.js') }}"></script>
    <script src="{{ asset('frontEnd/js/jquery.magnific-popup.js') }}"></script>
    {{-- <script src="{{ asset('frontEnd/js/jquery.nice-select.min.js') }}"></script> --}}
    <script src="{{ asset('frontEnd/js/jquery.counterup.min.js') }}"></script>
    <script src="{{ asset('frontEnd/js/waypoints.min.js') }}"></script>

    <script src="{{ asset('frontEnd/js/contact.js') }}"></script>
    <script src="{{ asset('frontEnd/js/jquery.form.js') }}"></script>
    <script src="{{ asset('frontEnd/js/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('frontEnd/js/mail-script.js') }}"></script>
    <script src="{{ asset('frontEnd/js/jquery.ajaxchimp.min.js') }}"></script>

    <script src="{{ asset('frontEnd/js/plugins.js') }}"></script>
    <script src="{{ asset('frontEnd/js/main.js') }}"></script>

    @yield('js-custom-frontend')
</body>

</html>
