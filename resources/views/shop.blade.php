@extends('layout.main_other')
@section('content')

    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__text">
                        <h4>Shop</h4>
                        <div class="breadcrumb__links">
                            <a href="/">Home</a>
                            <span>Shop</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Shop Section Begin -->
    <section class="shop spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="shop__sidebar">
{{--                        <div class="shop__sidebar__search">--}}
{{--                            <form action="#">--}}
{{--                                <input type="text" placeholder="Search...">--}}
{{--                                <button type="submit"><span class="icon_search"></span></button>--}}
{{--                            </form>--}}
{{--                        </div>--}}
                        <div class="shop__sidebar__accordion">
                            <div class="accordion" id="accordionExample">
                                <div class="card">
                                    <div class="card-heading">
                                        <a data-toggle="collapse" data-target="#collapseOne">Danh mục</a>
                                    </div>
                                    <div id="collapseOne" class="collapse show" data-parent="#accordionExample">
                                        <div class="card-body">
                                            <div class="shop__sidebar__categories">
                                                <ul class="nice-scroll">
                                                    {{--                                                <li><a href="#">Men (20)</a></li>--}}
                                                    {{--                                                <li><a href="#">Women (20)</a></li>--}}
                                                    {{--                                                <li><a href="#">Bags (20)</a></li>--}}
                                                    {{--                                                <li><a href="#">Clothing (20)</a></li>--}}
                                                    {{--                                                <li><a href="#">Shoes (20)</a></li>--}}
                                                    {{--                                                <li><a href="#">Accessories (20)</a></li>--}}
                                                    {{--                                                <li><a href="#">Kids (20)</a></li>--}}
                                                    {{--                                                <li><a href="#">Kids (20)</a></li>--}}
                                                    {{--                                                <li><a href="#">Kids (20)</a></li>--}}
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="shop__product__option">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="shop__product__option__left">
                                    <p>Showing 1–12 of 126 results</p>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="shop__product__option__right">
                                    {{--                                <p>Sort by Price:</p>--}}
                                    {{--                                <select>--}}
                                    {{--                                    <option value="">Low To High</option>--}}
                                    {{--                                    <option value="">$0 - $55</option>--}}
                                    {{--                                    <option value="">$55 - $100</option>--}}
                                    {{--                                </select>--}}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="product__item">
                                <a href="/shop/123">
                                    <div class="product__item__pic set-bg" data-setbg="img/product/product-2.jpg">
                                        {{--                                <ul class="product__hover">--}}
                                        {{--                                    <li><a href="#"><img src="img/icon/heart.png" alt=""></a></li>--}}
                                        {{--                                    <li><a href="#"><img src="img/icon/compare.png" alt=""> <span>Compare</span></a>--}}
                                        {{--                                    </li>--}}
                                        {{--                                    <li><a href="#"><img src="img/icon/search.png" alt=""></a></li>--}}
                                        {{--                                </ul>--}}
                                    </div>
                                </a>
                                <div class="product__item__text">
                                    <h6>Piqué Biker Jacket</h6>
                                    {{--                                <a href="#" class="add-cart">+ Add To Cart</a>--}}
                                    {{--                                <div class="rating">--}}
                                    {{--                                    <i class="fa fa-star-o"></i>--}}
                                    {{--                                    <i class="fa fa-star-o"></i>--}}
                                    {{--                                    <i class="fa fa-star-o"></i>--}}
                                    {{--                                    <i class="fa fa-star-o"></i>--}}
                                    {{--                                    <i class="fa fa-star-o"></i>--}}
                                    {{--                                </div>--}}
                                    {{--                                <h5>$67.24</h5>--}}
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
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="product__item sale">
                                <a href="/shop/123">
                                    <div class="product__item__pic set-bg" data-setbg="img/product/product-3.jpg">
                                        {{--                                <span class="label">Sale</span>--}}
                                        {{--                                <ul class="product__hover">--}}
                                        {{--                                    <li><a href="#"><img src="img/icon/heart.png" alt=""></a></li>--}}
                                        {{--                                    <li><a href="#"><img src="img/icon/compare.png" alt=""> <span>Compare</span></a>--}}
                                        {{--                                    </li>--}}
                                        {{--                                    <li><a href="#"><img src="img/icon/search.png" alt=""></a></li>--}}
                                        {{--                                </ul>--}}
                                    </div>
                                </a>
                                <div class="product__item__text">
                                    <h6>Multi-pocket Chest Bag</h6>
                                    {{--                                <a href="#" class="add-cart">+ Add To Cart</a>--}}
                                    {{--                                <div class="rating">--}}
                                    {{--                                    <i class="fa fa-star"></i>--}}
                                    {{--                                    <i class="fa fa-star"></i>--}}
                                    {{--                                    <i class="fa fa-star"></i>--}}
                                    {{--                                    <i class="fa fa-star"></i>--}}
                                    {{--                                    <i class="fa fa-star-o"></i>--}}
                                    {{--                                </div>--}}
                                    {{--                                <h5>$43.48</h5>--}}
                                    {{--                                <div class="product__color__select">--}}
                                    {{--                                    <label for="pc-7">--}}
                                    {{--                                        <input type="radio" id="pc-7">--}}
                                    {{--                                    </label>--}}
                                    {{--                                    <label class="active black" for="pc-8">--}}
                                    {{--                                        <input type="radio" id="pc-8">--}}
                                    {{--                                    </label>--}}
                                    {{--                                    <label class="grey" for="pc-9">--}}
                                    {{--                                        <input type="radio" id="pc-9">--}}
                                    {{--                                    </label>--}}
                                    {{--                                </div>--}}
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="product__item">
                                <a href="/shop/123">
                                    <div class="product__item__pic set-bg" data-setbg="img/product/product-4.jpg">
                                        {{--                                <ul class="product__hover">--}}
                                        {{--                                    <li><a href="#"><img src="img/icon/heart.png" alt=""></a></li>--}}
                                        {{--                                    <li><a href="#"><img src="img/icon/compare.png" alt=""> <span>Compare</span></a>--}}
                                        {{--                                    </li>--}}
                                        {{--                                    <li><a href="#"><img src="img/icon/search.png" alt=""></a></li>--}}
                                        {{--                                </ul>--}}
                                    </div>
                                </a>
                                <div class="product__item__text">
                                    <h6>Diagonal Textured Cap</h6>
                                    {{--                                <a href="#" class="add-cart">+ Add To Cart</a>--}}
                                    {{--                                <div class="rating">--}}
                                    {{--                                    <i class="fa fa-star-o"></i>--}}
                                    {{--                                    <i class="fa fa-star-o"></i>--}}
                                    {{--                                    <i class="fa fa-star-o"></i>--}}
                                    {{--                                    <i class="fa fa-star-o"></i>--}}
                                    {{--                                    <i class="fa fa-star-o"></i>--}}
                                    {{--                                </div>--}}
                                    {{--                                <h5>$60.9</h5>--}}
                                    {{--                                <div class="product__color__select">--}}
                                    {{--                                    <label for="pc-10">--}}
                                    {{--                                        <input type="radio" id="pc-10">--}}
                                    {{--                                    </label>--}}
                                    {{--                                    <label class="active black" for="pc-11">--}}
                                    {{--                                        <input type="radio" id="pc-11">--}}
                                    {{--                                    </label>--}}
                                    {{--                                    <label class="grey" for="pc-12">--}}
                                    {{--                                        <input type="radio" id="pc-12">--}}
                                    {{--                                    </label>--}}
                                    {{--                                </div>--}}
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="product__item sale">
                                <a href="/shop/123">
                                    <div class="product__item__pic set-bg" data-setbg="img/product/product-6.jpg">
                                        {{--                                <span class="label">Sale</span>--}}
                                        {{--                                <ul class="product__hover">--}}
                                        {{--                                    <li><a href="#"><img src="img/icon/heart.png" alt=""></a></li>--}}
                                        {{--                                    <li><a href="#"><img src="img/icon/compare.png" alt=""> <span>Compare</span></a>--}}
                                        {{--                                    </li>--}}
                                        {{--                                    <li><a href="#"><img src="img/icon/search.png" alt=""></a></li>--}}
                                        {{--                                </ul>--}}
                                    </div>
                                </a>
                                <div class="product__item__text">
                                    <h6>Ankle Boots</h6>
                                    {{--                                <a href="#" class="add-cart">+ Add To Cart</a>--}}
                                    {{--                                <div class="rating">--}}
                                    {{--                                    <i class="fa fa-star"></i>--}}
                                    {{--                                    <i class="fa fa-star"></i>--}}
                                    {{--                                    <i class="fa fa-star"></i>--}}
                                    {{--                                    <i class="fa fa-star"></i>--}}
                                    {{--                                    <i class="fa fa-star-o"></i>--}}
                                    {{--                                </div>--}}
                                    {{--                                <h5>$98.49</h5>--}}
                                    {{--                                <div class="product__color__select">--}}
                                    {{--                                    <label for="pc-16">--}}
                                    {{--                                        <input type="radio" id="pc-16">--}}
                                    {{--                                    </label>--}}
                                    {{--                                    <label class="active black" for="pc-17">--}}
                                    {{--                                        <input type="radio" id="pc-17">--}}
                                    {{--                                    </label>--}}
                                    {{--                                    <label class="grey" for="pc-18">--}}
                                    {{--                                        <input type="radio" id="pc-18">--}}
                                    {{--                                    </label>--}}
                                    {{--                                </div>--}}
                                </div>
                            </div>
                        </div>
                    </div>
                    {{--                <div class="row">--}}
                    {{--                    <div class="col-lg-12">--}}
                    {{--                        <div class="product__pagination">--}}
                    {{--                            <a class="active" href="#">1</a>--}}
                    {{--                            <a href="#">2</a>--}}
                    {{--                            <a href="#">3</a>--}}
                    {{--                            <span>...</span>--}}
                    {{--                            <a href="#">21</a>--}}
                    {{--                        </div>--}}
                    {{--                    </div>--}}
                    {{--                </div>--}}
                </div>
            </div>
        </div>
    </section>
    <!-- Shop Section End -->

@endsection
