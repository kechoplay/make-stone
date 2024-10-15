@extends('layout.main')
@section('content')
    @if($page == 1)
        <div class="image-main">
            <div style="width: 70%; margin: 0 auto; position: relative">
                <img class="img-main" src="/img/wrapper.png?version={{ config('phohien.version') }}">
                <img class="img-sub" src="/img/sub-img.png?version={{ config('phohien.version') }}">
            </div>
        </div>
        <div class="text-center">
            <div class="pagination">
                <a href="?page=1" class="@if($page == 1) active @endif">1</a>
                <a href="?page=2" class="@if($page == 2) active @endif">2</a>
                <a href="?page=3" class="@if($page == 3) active @endif">3</a>
                <a href="?page=4" class="@if($page == 4) active @endif">4</a>
                <a href="?page=5" class="@if($page == 5) active @endif">5</a>
                <a href="?page=6" class="@if($page == 6) active @endif">6</a>
                <a href="?page=7" class="@if($page == 7) active @endif">7</a>
                <a href="?page=8" class="@if($page == 8) active @endif">8</a>
                <a href="?page=9" class="@if($page == 9) active @endif">9</a>
                <a href="?page=10" class="@if($page == 10) active @endif">10</a>
                <a href="?page=11" class="@if($page == 11) active @endif">11</a>
            </div>
        </div>
    @else
        <div style="background-image: url('/img/bg.jpg'); background-size: 100% 100%;" class="main-bg">
            @if($page == 2)
                <section class="hero text-center">
                    <iframe width="70%" height="550" style="margin-bottom: 10px;"
                            src="https://www.youtube.com/embed/KqrnsmhV6ao?si=F0lYqEJxBUyuGQnW"
                            title="YouTube video player" frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                            referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                    <iframe width="70%" height="550" style="margin-bottom: 10px;"
                            src="https://www.youtube.com/embed/huITWESyncM?si=t4oX5ZX8UdIrCycn"
                            title="YouTube video player" frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                            referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                </section>
            @endif
            @if($page == 3)
                <section class="hero text-center">
                    <iframe width="70%" height="550" style="margin-bottom: 10px;"
                            src="https://www.youtube.com/embed/exc4RuleOqs?si=8EOt-XPcl4zTnEdS"
                            title="YouTube video player" frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                            referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                    <div style="background: #FFFFFF; width: 70%; margin: 0 auto">
                    <p style="font-weight: 700;margin-bottom: 20px; display: block; cursor: pointer;"
                       data-fancybox="gallery" data-src="/001.pdf" data-type="pdf">
                        Vệt nắng - chế tác Nguyễn Duy Ngọc
                    </p>
                    </div>
                    <iframe width="70%" height="550" style="margin-bottom: 10px;"
                            src="https://www.youtube.com/embed/E1qrXPTFu90?si=AJ8EUN9-rbqiHD63"
                            title="YouTube video player" frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                            referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                    <iframe width="70%" height="550" style="margin-bottom: 10px;"
                            src="https://www.youtube.com/embed/WgQl0XOsuz8?si=ZJLaZTluE1QbP8f8"
                            title="YouTube video player" frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                            referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                </section>
            @endif
            @if($page == 4)
                <section class="hero text-center">
                    <iframe width="70%" height="550" style="margin-bottom: 10px;"
                            src="https://www.youtube.com/embed/w3XMVbRWVYQ?si=Q7Vjz7Fengt3U3UE"
                            title="YouTube video player" frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                            referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                    <iframe width="70%" height="550" style="margin-bottom: 10px;"
                            src="https://www.youtube.com/embed/RLFztMy0Oik?si=ug5MnJTZsfhqNAsN"
                            title="YouTube video player" frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                            referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                    <iframe width="70%" height="550" style="margin-bottom: 10px;"
                            src="https://www.youtube.com/embed/tpPau-0Hj7U?si=VJzG2zGl2swu_5El"
                            title="YouTube video player" frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                            referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                </section>
            @endif
            @if($page == 5)
                <section class="hero text-center">
                    <iframe width="70%" height="550" style="margin-bottom: 10px;"
                            src="https://www.youtube.com/embed/8dr92fBNGig?si=KfUr3BAHx8Fq8M97"
                            title="YouTube video player" frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                            referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                    <iframe width="70%" height="550" style="margin-bottom: 10px;"
                            src="https://www.youtube.com/embed/HnxMHHwE7yc?si=PREf-gJLhUmuLmsQ"
                            title="YouTube video player" frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                            referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                    <iframe width="70%" height="550" style="margin-bottom: 10px;"
                            src="https://www.youtube.com/embed/4LbcgOld3dc?si=Y0n6pGm6KoBWQkZE"
                            title="YouTube video player" frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                            referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                </section>
            @endif
            @if($page == 6)
                <section class="hero text-center">
                    <iframe width="70%" height="550" style="margin-bottom: 10px;"
                            src="https://www.youtube.com/embed/LDqcyoXtqRo?si=Ixc4YYDpHaB31R8s"
                            title="YouTube video player" frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                            referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                    <iframe width="70%" height="550" style="margin-bottom: 10px;"
                            src="https://www.youtube.com/embed/Q5nSAajyoOg?si=FjkSMWtfxcyC0ajE"
                            title="YouTube video player" frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                            referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                    <iframe width="70%" height="550" style="margin-bottom: 10px;"
                            src="https://www.youtube.com/embed/ZvggwJRAQDs?si=HYZ4V14P6_v_fGY3"
                            title="YouTube video player" frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                            referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                </section>
            @endif
            @if($page == 7)
                <section class="hero text-center">
                    <iframe width="70%" height="550" style="margin-bottom: 10px;"
                            src="https://www.youtube.com/embed/YMLExfuZI5k?si=QTyUBFdNMYP8zAq6"
                            title="YouTube video player" frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                            referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                    <iframe width="70%" height="550" style="margin-bottom: 10px;"
                            src="https://www.youtube.com/embed/mWPOx-k_C-Q?si=MIoOIER6K2ru43dJ"
                            title="YouTube video player" frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                            referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                    <iframe width="70%" height="550" style="margin-bottom: 10px;"
                            src="https://www.youtube.com/embed/zcJY42xlRSM?si=nOYe2RL4fbXZFYLf"
                            title="YouTube video player" frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                            referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                </section>
            @endif
            @if($page == 8)
                <section class="hero text-center">
                    <iframe width="70%" height="550" style="margin-bottom: 10px;"
                            src="https://www.youtube.com/embed/Qr8SGQjhmS0?si=zW7PEwAr_tengYfb"
                            title="YouTube video player" frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                            referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                    <iframe width="70%" height="550" style="margin-bottom: 10px;"
                            src="https://www.youtube.com/embed/vWrQ1ExDZY0?si=KUG_UI7QQ3QWRmsk"
                            title="YouTube video player" frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                            referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                    <iframe width="70%" height="550" style="margin-bottom: 10px;"
                            src="https://www.youtube.com/embed/Pkv4vE3PUYM?si=TM0ZSRKxrkEgceP4"
                            title="YouTube video player" frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                            referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                </section>
            @endif
            @if($page == 9)
                <section class="hero text-center">
                    <iframe width="70%" height="550" style="margin-bottom: 10px;"
                            src="https://www.youtube.com/embed/zFyvxqDszXM?si=d_xd5BTS9zFK79BE"
                            title="YouTube video player" frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                            referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                    <iframe width="70%" height="550" style="margin-bottom: 10px;"
                            src="https://www.youtube.com/embed/aYcuiek1QWY?si=JbsPZ1QyahLB5EKp"
                            title="YouTube video player" frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                            referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                    <iframe width="70%" height="550" style="margin-bottom: 10px;"
                            src="https://www.youtube.com/embed/P65HESv8V50?si=hCs-F6JjDo3S86kw"
                            title="YouTube video player" frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                            referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                </section>
            @endif
            @if($page == 10)
                <section class="hero text-center">
                    <iframe width="70%" height="550" style="margin-bottom: 10px;"
                            src="https://www.youtube.com/embed/xMhWwKcOr1c?si=moPB6-1kYw8QMECP"
                            title="YouTube video player" frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                            referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                    <iframe width="70%" height="550" style="margin-bottom: 10px;"
                            src="https://www.youtube.com/embed/tRWczQe2x6E?si=9C7hU7vdZg3DaZiM"
                            title="YouTube video player" frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                            referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                    <iframe width="70%" height="550" style="margin-bottom: 10px;"
                            src="https://www.youtube.com/embed/3bh4eIno5ms?si=FTAvDMDDru9EPZRr"
                            title="YouTube video player" frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                            referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                </section>
            @endif
            @if($page == 11)
                <section class="hero text-center">
                    <iframe width="70%" height="550" style="margin-bottom: 10px;"
                            src="https://www.youtube.com/embed/QUVZsMtMfm8?si=zgjTCIjaZICjvrV9"
                            title="YouTube video player" frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                            referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                    <iframe width="70%" height="550" style="margin-bottom: 10px;"
                            src="https://www.youtube.com/embed/TMEyF8pA6UU?si=NNZ3vAxo2r1UNIlL"
                            title="YouTube video player" frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                            referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                    <iframe width="70%" height="550" style="margin-bottom: 10px;"
                            src="https://www.youtube.com/embed/hBv7kPwmzro?si=Np26xr7qiwgAbWjw"
                            title="YouTube video player" frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                            referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                </section>
            @endif
            <div class="text-center">
                <div class="pagination">
                    <a href="?page=1" class="@if($page == 1) active @endif">1</a>
                    <a href="?page=2" class="@if($page == 2) active @endif">2</a>
                    <a href="?page=3" class="@if($page == 3) active @endif">3</a>
                    <a href="?page=4" class="@if($page == 4) active @endif">4</a>
                    <a href="?page=5" class="@if($page == 5) active @endif">5</a>
                    <a href="?page=6" class="@if($page == 6) active @endif">6</a>
                    <a href="?page=7" class="@if($page == 7) active @endif">7</a>
                    <a href="?page=8" class="@if($page == 8) active @endif">8</a>
                    <a href="?page=9" class="@if($page == 9) active @endif">9</a>
                    <a href="?page=10" class="@if($page == 10) active @endif">10</a>
                    <a href="?page=11" class="@if($page == 11) active @endif">11</a>
                </div>
            </div>

            <footer class="footer">
                <div class="container">
                    <div class="row">
                        @if($page == 2)
                            <div class="col-lg-12 col-md-12 col-sm-12 text-center">
                                <div class="footer__about">
                                    <h4 style="font-weight: bold; font-size: 14px;">PHO HIEN</h4>
                                    <h4 style="font-weight: bold; font-size: 14px; margin-bottom: 20px;">JEWEL</h4>
                                    <p style="font-weight: bold; font-size: 14px;">Tìm kiếm, thưởng thức vẻ đẹp ngay bên
                                        bạn</p>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </footer>
        </div>
    @endif
@endsection
