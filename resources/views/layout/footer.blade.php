<!-- Footer Section Begin -->
<footer class="footer">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6 text-center">
                <div class="footer__about">
                    <div class="footer__logo">
                        <a href="#"><img src="/img/footer-logo.png" width="200px" alt=""></a>
                    </div>
                    <p>Tìm kiếm, thưởng thức vẻ đẹp ngay bên bạn</p>
                </div>
            </div>
            <div class="col-lg-2 offset-lg-1 col-md-3 col-sm-6">
                <div class="footer__widget">
                    <h6>Contact us</h6>
                    <ul>
                        <li><a href="#">Clothing Store</a></li>
                        <li><a href="#">Trending Shoes</a></li>
                        <li><a href="#">Accessories</a></li>
                        <li><a href="#">Sale</a></li>
                    </ul>
                </div>
            </div>
            {{--            <div class="col-lg-2 col-md-3 col-sm-6">--}}
            {{--                <div class="footer__widget">--}}
            {{--                    <h6>Shopping</h6>--}}
            {{--                    <ul>--}}
            {{--                        <li><a href="#">Contact Us</a></li>--}}
            {{--                        <li><a href="#">Payment Methods</a></li>--}}
            {{--                        <li><a href="#">Delivary</a></li>--}}
            {{--                        <li><a href="#">Return & Exchanges</a></li>--}}
            {{--                    </ul>--}}
            {{--                </div>--}}
            {{--            </div>--}}
            {{--            <div class="col-lg-3 offset-lg-1 col-md-6 col-sm-6">--}}
            {{--                <div class="footer__widget">--}}
            {{--                    <h6>NewLetter</h6>--}}
            {{--                    <div class="footer__newslatter">--}}
            {{--                        <p>Be the first to know about new arrivals, look books, sales & promos!</p>--}}
            {{--                        <form action="#">--}}
            {{--                            <input type="text" placeholder="Your email">--}}
            {{--                            <button type="submit"><span class="icon_mail_alt"></span></button>--}}
            {{--                        </form>--}}
            {{--                    </div>--}}
            {{--                </div>--}}
            {{--            </div>--}}
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
    window.addEventListener("click", function(event) {
        $('#audio')[0].play()
    });

</script>
