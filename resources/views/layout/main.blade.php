<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="PhoHien Jewel - Tìm kiếm, thưởng thức vẻ đẹp ngay bên bạn">
    <meta name="keywords" content="PhoHien Jewel - Tìm kiếm, thưởng thức vẻ đẹp ngay bên bạn">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>PhoHien Jewel</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300;400;600;700;800;900&display=swap"
          rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="/css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="/css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="/css/magnific-popup.css" type="text/css">
    <link rel="stylesheet" href="/css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="/css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="/css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="/css/style.css" type="text/css">
</head>

<body>
<!-- Page Preloder -->
{{-- <div id="preloder">
    <div class="loader"></div>
</div> --}}

<!-- Offcanvas Menu Begin -->
<div class="offcanvas-menu-overlay"></div>
<div class="offcanvas-menu-wrapper">
{{--    <div class="offcanvas__nav__option">--}}
{{--        <a href="#" class="search-switch"><img src="img/icon/search.png" alt=""></a>--}}
{{--        <a href="#"><img src="img/icon/heart.png" alt=""></a>--}}
{{--        <a href="#"><img src="img/icon/cart.png" alt=""> <span>0</span></a>--}}
{{--        <div class="price">$0.00</div>--}}
{{--    </div>--}}
    <div id="mobile-menu-wrap"></div>
</div>
<!-- Offcanvas Menu End -->

{{--@include('layout.header')--}}

@yield('content')

{{--@include('layout.footer')--}}
@stack('js')
</body>

</html>
