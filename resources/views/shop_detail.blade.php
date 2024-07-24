@extends('layout.main_other')
@section('content')

    <section class="shop-details related">
        <div class="product__details__pic">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="product__details__breadcrumb">
                            <a href="/">Trang chủ</a>
                            <a href="/shop">Shop</a>
                            <span>Chi tiết sản phẩm</span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-3 col-md-3">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#image-tabs-1" role="tab">
                                    <div class="product__thumb__pic set-bg" data-setbg="{{ $product->main_image }}">
                                    </div>
                                </a>
                            </li>
                            @foreach ($product->sub_image as $key => $subImage)
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#image-tabs-{{ $key+2 }}"
                                       role="tab">
                                        <div class="product__thumb__pic set-bg" data-setbg="{{ $subImage }}">
                                        </div>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="col-lg-6 col-md-9">
                        <div class="tab-content">
                            <div class="tab-pane active" id="image-tabs-1" role="tabpanel">
                                <div class="product__details__pic__item">
                                    <img src="{{ $product->main_image }}" alt="">
                                </div>
                            </div>
                            @foreach ($product->sub_image as $key => $subImage)
                                <div class="tab-pane" id="image-tabs-{{$key+2}}" role="tabpanel">
                                    <div class="product__details__pic__item">
                                        <img src="{{$subImage}}" alt="">
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="product__details__content">
            <div class="container">
                <div class="row d-flex justify-content-center">
                    <div class="col-lg-8">
                        <div class="product__details__text">
                            <h4>{{$product->name}}</h4>
                            @if($product->price != 0)
                                <h3>{{ $product->price }} VNĐ</h3>
                            @endif
                            <div class="product__details__cart__option">
                                {{--                                <div class="quantity">--}}
                                {{--                                    <div class="pro-qty">--}}
                                {{--                                        <input type="text" value="1">--}}
                                {{--                                    </div>--}}
                                {{--                                </div>--}}
                                @if($hasBidding)
                                    <button type="button" class="primary-btn" data-toggle="modal"
                                            data-target="#biddingModal">Đấu giá
                                    </button>
                                @endif
                            </div>
                            {{--                            <div class="product__details__btns__option">--}}
                            {{--                                <a href="#"><i class="fa fa-heart"></i> add to wishlist</a>--}}
                            {{--                                <a href="#"><i class="fa fa-exchange"></i> Add To Compare</a>--}}
                            {{--                            </div>--}}
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="product__details__tab">
                            <ul class="nav nav-tabs" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" data-toggle="tab" href="#description"
                                       role="tab">Thông tin sản phẩm</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#bidding" role="tab">Thông tin đấu
                                        giá</a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane active" id="description" role="tabpanel">
                                    <div class="product__details__tab__content">
                                        {{ $product->description }}
                                    </div>
                                </div>
                                <div class="tab-pane" id="bidding" role="tabpanel">
                                    <div class="product__details__tab__content">

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="biddingModal" tabindex="-1" aria-labelledby="biddingModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="biddingModalLabel">Đấu giá</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="formMakeOffer">
                            <div class="form-group">
                                <label for="emailOffer">Địa chỉ email</label>
                                <input type="email" class="form-control" id="emailOffer" name="emailOffer">
                            </div>
                            <div class="form-group">
                                <label for="nameOffer">Tên người đấu giá</label>
                                <input type="text" class="form-control" id="nameOffer" name="nameOffer">
                            </div>
                            <div class="form-group">
                                <label for="priceOffer">Số tiền đấu giá</label>
                                <input type="number" class="form-control" name="priceOffer" id="priceOffer">
                            </div>
                            <input type="hidden" name="productId" id="productId" value="{{ $product->id }}">
                            <button type="button" onclick="makeOffer()" class="btn btn-primary">Tạo đấu giá</button>
                        </form>
                    </div>
                    {{--                    <div class="modal-footer">--}}
                    {{--                        <button type="button" class="btn btn-primary">Tạo đấu giá</button>--}}
                    {{--                    </div>--}}
                </div>
            </div>
        </div>
    </section>
    <!-- Shop Section End -->

@endsection
@push('js')
    <script>
        function makeOffer() {
            $.ajaxSetup({headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});
            let price = $('#priceOffer').val()
            let email = $('#emailOffer').val()
            if (!price) {
                alert('Hãy nhập giá')
                return
            }
            if (!email) {
                alert('Hãy nhập email')
                return
            }
            $.ajax({
                type: "POST",
                dataType: "json",
                url: "{{ url('/products/make-offer') }}",
                data: {
                    priceOffer: price,
                    emailOffer: email,
                    nameOffer: $('#nameOffer').val(),
                    productId: $('#productId').val()
                },
                success: function (response) {
                    if (response.success) {
                        alert('Đấu giá thành công')
                        window.location.reload()
                    } else {
                        alert(response.message)
                    }
                }
            });

        }

    </script>
@endpush
