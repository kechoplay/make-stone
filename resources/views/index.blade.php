@extends('layout.main')
@section('content')
    <div id="home-two-banner" class="home-banner-box">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-6">
                    <div class="hbb-item pb-50">
                        <a href="/shop">
                            <img width="555" height="694"
                                 src="//theme.hstatic.net/200000884739/1001246736/14/htb_img_1.jpg?v=225" alt="Dress"
                                 loading="lazy">
                        </a>
                    </div>
                </div>

                <div class="col-12 col-md-6">
                    <div class="hbb-item pb-50">
                        <a href="/shop">
                            <img width="555" height="694"
                                 src="//theme.hstatic.net/200000884739/1001246736/14/htb_img_2.jpg?v=225" alt="Set"
                                 loading="lazy">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Product Section Begin -->
    <section class="product spad">
        <div class="container">
            {{--            <div class="row">--}}
            {{--                <div class="col-lg-12">--}}
            {{--                    <ul class="filter__controls">--}}
            {{--                        <li class="active" data-filter="*">Best Sellers</li>--}}
            {{--                        <li data-filter=".new-arrivals">New Arrivals</li>--}}
            {{--                        <li data-filter=".hot-sales">Hot Sales</li>--}}
            {{--                    </ul>--}}
            {{--                </div>--}}
            {{--            </div>--}}
            <div class="row product__filter">
                @foreach ($list as $one)
                    <div class="col-lg-3 col-md-6 col-sm-6 col-md-6 col-sm-6 mix hot-sales">
                        <div class="product__item">
                            <div class="product__item__pic set-bg" data-setbg="{{$one['main_image']}}">
                                {{--                            <ul class="product__hover">--}}
                                {{--                                <li><a href="#"><img src="img/icon/heart.png" alt=""></a></li>--}}
                                {{--                                <li><a href="#"><img src="img/icon/compare.png" alt=""> <span>Compare</span></a></li>--}}
                                {{--                                <li><a href="#"><img src="img/icon/search.png" alt=""></a></li>--}}
                                {{--                            </ul>--}}
                            </div>
                            <div class="product__item__text">
                                <h3>{{$one['name']}}</h3>
                                {{--                            <a href="#" class="add-cart">+ Add To Cart</a>--}}
                                {{--                            <div class="rating">--}}
                                {{--                                <i class="fa fa-star-o"></i>--}}
                                {{--                                <i class="fa fa-star-o"></i>--}}
                                {{--                                <i class="fa fa-star-o"></i>--}}
                                {{--                                <i class="fa fa-star-o"></i>--}}
                                {{--                                <i class="fa fa-star-o"></i>--}}
                                {{--                            </div>--}}
                                {{--                            <h5>$67.24</h5>--}}
                                {{--                            <div class="product__color__select">--}}
                                {{--                                <label for="pc-4">--}}
                                {{--                                    <input type="radio" id="pc-4">--}}
                                {{--                                </label>--}}
                                {{--                                <label class="active black" for="pc-5">--}}
                                {{--                                    <input type="radio" id="pc-5">--}}
                                {{--                                </label>--}}
                                {{--                                <label class="grey" for="pc-6">--}}
                                {{--                                    <input type="radio" id="pc-6">--}}
                                {{--                                </label>--}}
                                {{--                            </div>--}}
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- Product Section End -->
@endsection
