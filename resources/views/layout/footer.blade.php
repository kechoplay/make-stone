<!-- Footer Section Begin -->
<footer class="footer">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="footer__about">
                    <div class="footer__logo">
                        <a href="#"><img src="/img/footer-logo.png" alt=""></a>
                    </div>
                    <p>The customer is at the heart of our unique business model, which includes design.</p>
                    <a href="#"><img src="/img/payment.png" alt=""></a>
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
    $(function(){
        $('.insert-category').on('submit',function(e){
            e.preventDefault();
            let formData = new FormData($(this)[0]);
            $.ajax({
                method: "POST",
                url: "{{route('category.insert')}}",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: formData,
                processData: false,
                contentType: false,
                dataType: 'json',
                success: function(res){
                    alert(res.message);
                },
                error: function(err){
                    console.log(err);
                    if(err.status == 422){
                        if(err.responseJSON.message.name[0]) alert(err.responseJSON.message.name[0])
                    }
                    if(err.status == 500) alert(err.responseJSON.message);
                }
            })
        })
    })
</script>
