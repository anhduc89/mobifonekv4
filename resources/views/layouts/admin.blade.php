<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @yield('title')

    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="{{ asset('AdminLTE/plugins/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="{{ asset('AdminLTE/dist/css/adminlte.min.css') }}">
    <link rel="stylesheet" href="{{ asset('AdminLTE/dist/css/custom-admin.css') }}">
    @yield('css-custom-admin')
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        @include('partials.header')
        @include('partials.sidebar')
        @yield('content')
        @include('partials.footer')
    </div>

    <script src="{{ asset('AdminLTE/plugins/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('AdminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('AdminLTE/dist/js/adminlte.js') }}"></script>
    @yield('js-custom-admin')
</body>

</html>
