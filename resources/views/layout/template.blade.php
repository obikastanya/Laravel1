<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->

    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">
    @yield('css')
    <link rel="shortcut icon" href="{{asset('assets/img/icon/2.png')}}" type="image/png" />
    <title>@yield('title')</title>

</head>

@yield('container')

<body>
    <script src="{{asset('assets/js/jquery-3.4.1.min.js')}}"></script>
    <script src="{{asset('assets/js/popper.min.js')}}"></script>
    <script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
    @yield('js')
</body>

</html>