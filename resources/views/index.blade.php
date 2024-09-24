@extends('layout.main')
@section('content')
    <div class="image-main">
        <img src="/img/image-main.jpg?version={{ config('phohien.version') }}">
    </div>
    <!-- Hero Section Begin -->
    <section class="hero">
        <iframe width="560" height="315" src="https://www.youtube.com/embed/6julmDPvrNg?si=tKVrHSwV2ZdsFNJ-" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
        <iframe width="560" height="315" src="https://www.youtube.com/embed/Z9BnH_tZPJo?si=sblamF72lKYyMuWA" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
    </section>

{{--    <div id="home-two-banner" class="home-banner-box">--}}
{{--        <div class="container">--}}
{{--            <div class="row">--}}
{{--                @foreach ($list as $one)--}}
{{--                    <div class="col-12 col-sm-4 col-md-6 text-center">--}}
{{--                        <div class="hbb-item">--}}
{{--                            <a href="/products/{{ $one['id'] }}">--}}
{{--                                <img width="555" height="694"--}}
{{--                                     src="{{$one['main_image']}}"--}}
{{--                                     alt="Dress"--}}
{{--                                     loading="lazy">--}}
{{--                            </a>--}}
{{--                            <div class="product__item__text">--}}
{{--                                <h3>{{$one['name']}}</h3>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                @endforeach--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
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
                    <div class="col-lg-3 col-md-6 col-sm-6 col-md-12 col-sm-6 mix hot-sales">
                        <div class="product__item">
                            <a href="/products/{{ $one['id'] }}">
                                <div class="product__item__pic set-bg" data-setbg="{{$one['main_image']}}">
{{--                                    <ul class="product__hover">--}}
{{--                                        <li><a href="#"><img src="img/icon/heart.png" alt=""></a></li>--}}
{{--                                        <li><a href="#"><img src="img/icon/compare.png" alt=""> <span>Compare</span></a>--}}
{{--                                        </li>--}}
{{--                                        <li><a href="#"><img src="img/icon/search.png" alt=""></a></li>--}}
{{--                                    </ul>--}}
                                </div>
                            </a>
                            <div class="product__item__text">
                                <h5>
                                    <a href="/products/{{ $one['id'] }}">{{$one['name']}}</a>
                                </h5>
{{--                                <a href="#" class="add-cart">+ Add To Cart</a>--}}
{{--                                <div class="rating">--}}
{{--                                    <i class="fa fa-star-o"></i>--}}
{{--                                    <i class="fa fa-star-o"></i>--}}
{{--                                    <i class="fa fa-star-o"></i>--}}
{{--                                    <i class="fa fa-star-o"></i>--}}
{{--                                    <i class="fa fa-star-o"></i>--}}
{{--                                </div>--}}
{{--                                <h5>{{$one['price']}} VNĐ</h5>--}}
{{--                                <div class="product__color__select">--}}
{{--                                    <label for="pc-4">--}}
{{--                                        <input type="radio" id="pc-4">--}}
{{--                                    </label>--}}
{{--                                    <label class="active black" for="pc-5">--}}
{{--                                        <input type="radio" id="pc-5">--}}
{{--                                    </label>--}}
{{--                                    <label class="grey" for="pc-6">--}}
{{--                                        <input type="radio" id="pc-6">--}}
{{--                                    </label>--}}
{{--                                </div>--}}
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="text-center">
                <a href="/shop" class="primary-btn">Xem tất </a>
            </div>
        </div>
    </section>
    <!-- Product Section End -->
@endsection
