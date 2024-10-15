<!-- Footer Section Begin -->
<footer class="footer">
    <div class="container">
        <div class="row">
            @if($page != 1)
                <div class="col-lg-12 col-md-12 col-sm-12 text-center">
                    <div class="footer__about">
                        <h2 style="font-weight: bold">PHO HIEN</h2>
                        <h2 style="font-weight: bold; margin-bottom: 20px;">JEWEL</h2>
                        <p style="font-weight: bold">Tìm kiếm, thưởng thức vẻ đẹp ngay bên bạn</p>
                    </div>
                </div>
            @endif
        </div>
    </div>
</footer>
<!-- Footer Section End -->
<audio autoplay loop id="audio">
    <source src="/img/audio.mp3" type="audio/mpeg" width="0px" height="0px">
    Your browser does not support the audio element.
</audio>
<!-- Js Plugins -->
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
<script>
    $(document).on('click', '#img-sub', function () {
        $('#audio')[0].play()
    })

</script>
