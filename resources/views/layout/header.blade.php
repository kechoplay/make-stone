<header class="header">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-3">
                <div class="header__logo">
                    <a href="/"><img src="/img/logo.png" style="height: 100px" alt=""></a>
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <nav class="header__menu mobile-menu">
                    <ul>
                        <li class="active"><a href="/">Home</a></li>
                        <li><a href="/shop">Shop</a></li>
                        {{--                        <li><a href="#">Pages</a>--}}
                        {{--                            <ul class="dropdown">--}}
                        {{--                                <li><a href="./about.html">About Us</a></li>--}}
                        {{--                                <li><a href="./shop-details.html">Shop Details</a></li>--}}
                        {{--                                <li><a href="./shopping-cart.html">Shopping Cart</a></li>--}}
                        {{--                                <li><a href="./checkout.html">Check Out</a></li>--}}
                        {{--                                <li><a href="./blog-details.html">Blog Details</a></li>--}}
                        {{--                            </ul>--}}
                        {{--                        </li>--}}
                        {{--                        <li><a href="./blog.html">Blog</a></li>--}}
                        <li><a href="./contact.html">Contacts</a></li>
                    </ul>
                </nav>
            </div>
            <div class="col-lg-3 col-md-3">
                {{--                <div class="header__nav__option">--}}
                {{--                    <a href="#" class="search-switch"><img src="img/icon/search.png" alt=""></a>--}}
                {{--                    <a href="#"><img src="img/icon/heart.png" alt=""></a>--}}
                {{--                    <a href="#"><img src="img/icon/cart.png" alt=""> <span>0</span></a>--}}
                {{--                    <div class="price">$0.00</div>--}}
                {{--                </div>--}}
            </div>
        </div>
        <div class="canvas__open"><i class="fa fa-bars"></i></div>
    </div>
</header>
<!-- Header Section End -->

<!-- Hero Section Begin -->
<section class="hero">
    <div class="hero__slider owl-carousel owl-theme">
        @foreach(range(1, 6) as $item)
            <div class="item-video">
                <video width="100%" height="750px" controls>
                    <source src="/img/video{{ $item }}.mp4" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
            </div>
        @endforeach
        {{--        <div class="hero__items set-bg" data-setbg="img/hero/hero-1.jpg">--}}
        {{--            <div class="container">--}}
        {{--                <div class="row">--}}
        {{--                    <div class="col-xl-5 col-lg-7 col-md-8">--}}
        {{--                        <div class="hero__text">--}}
        {{--                            <h6>Summer Collection</h6>--}}
        {{--                            <h2>Fall - Winter Collections 2030</h2>--}}
        {{--                            <p>A specialist label creating luxury essentials. Ethically crafted with an unwavering--}}
        {{--                                commitment to exceptional quality.</p>--}}
        {{--                            <a href="#" class="primary-btn">Shop now <span class="arrow_right"></span></a>--}}
        {{--                            <div class="hero__social">--}}
        {{--                                <a href="#"><i class="fa fa-facebook"></i></a>--}}
        {{--                                <a href="#"><i class="fa fa-twitter"></i></a>--}}
        {{--                                <a href="#"><i class="fa fa-pinterest"></i></a>--}}
        {{--                                <a href="#"><i class="fa fa-instagram"></i></a>--}}
        {{--                            </div>--}}
        {{--                        </div>--}}
        {{--                    </div>--}}
        {{--                </div>--}}
        {{--            </div>--}}
        {{--        </div>--}}
        {{--        <div class="hero__items set-bg" data-setbg="img/hero/hero-2.jpg">--}}
        {{--            <div class="container">--}}
        {{--                <div class="row">--}}
        {{--                    <div class="col-xl-5 col-lg-7 col-md-8">--}}
        {{--                        <div class="hero__text">--}}
        {{--                            <h6>Summer Collection</h6>--}}
        {{--                            <h2>Fall - Winter Collections 2030</h2>--}}
        {{--                            <p>A specialist label creating luxury essentials. Ethically crafted with an unwavering--}}
        {{--                                commitment to exceptional quality.</p>--}}
        {{--                            <a href="#" class="primary-btn">Shop now <span class="arrow_right"></span></a>--}}
        {{--                            <div class="hero__social">--}}
        {{--                                <a href="#"><i class="fa fa-facebook"></i></a>--}}
        {{--                                <a href="#"><i class="fa fa-twitter"></i></a>--}}
        {{--                                <a href="#"><i class="fa fa-pinterest"></i></a>--}}
        {{--                                <a href="#"><i class="fa fa-instagram"></i></a>--}}
        {{--                            </div>--}}
        {{--                        </div>--}}
        {{--                    </div>--}}
        {{--                </div>--}}
        {{--            </div>--}}
        {{--        </div>--}}
    </div>
</section>
