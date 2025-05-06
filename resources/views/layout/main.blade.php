<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="PhoHien Jewel - Find and enjoy beauty right next to you">
    <meta name="keywords" content="PhoHien Jewel - Find and enjoy beauty right next to you">
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.css"/>
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
<audio loop id="audio">
    <source src="/img/audio.mp3" type="audio/mpeg" width="0px" height="0px">
    Your browser does not support the audio element.
</audio>
<script src="/js/jquery-3.3.1.min.js"></script>
<script src="/js/bootstrap.min.js"></script>
<script src="/js/jquery.nice-select.min.js"></script>
<script src="/js/jquery.nicescroll.min.js"></script>
<script src="/js/jquery.magnific-popup.min.js"></script>
<script src="/js/jquery.countdown.min.js"></script>
<script src="/js/jquery.slicknav.js"></script>
<script src="/js/mixitup.min.js"></script>
<script src="/js/owl.carousel.min.js"></script>
{{--<script src="/js/owl.video.js"></script>--}}
<script src="/js/main.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.umd.js"></script>
<script>
    Fancybox.bind('[data-fancybox="gallery"]', {
        Images: {
            zoom: true,
        },
        animated: true
    });
    function openAudio() {
        if ($('#audio')[0].paused)
            $('#audio')[0].play()
        else
            $('#audio')[0].pause()
    }
</script>
@stack('js')
</body>

</html>
