@extends('layout.main')
@section('content')
    @if($page == 1)
        <div class="image-main">
            <img src="/img/wrapper.png?version={{ config('phohien.version') }}">
        </div>
        <div class="text-center">
            <div class="pagination">
                <a href="?page=1" class="@if($page == 1) active @endif">1</a>
                <a href="?page=2" class="@if($page == 2) active @endif">2</a>
                <a href="?page=3" class="@if($page == 3) active @endif">3</a>
                <a href="?page=4" class="@if($page == 4) active @endif">4</a>
                <a href="?page=5" class="@if($page == 5) active @endif">5</a>
            </div>
        </div>
    @else
        <div style="background-image: url('/img/bg.png'); background-size: 100% 100%;" class="main-bg">
            @if($page == 2)
                <section class="hero text-center">
                    <iframe width="70%" height="550" style="margin-bottom: 10px;"
                            src="https://www.youtube.com/embed/KqrnsmhV6ao?si=F0lYqEJxBUyuGQnW"
                            title="YouTube video player" frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                            referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                    <iframe width="70%" height="550" style="margin-bottom: 10px;"
                            src="https://www.youtube.com/embed/ShYoPpnUW5g?si=jIJ4t7RxlEFHJRQY"
                            title="YouTube video player"
                            frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                            referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                </section>
            @endif
            @if($page == 3)
                <section class="hero text-center" style="padding-top: 50px">
                    <iframe width="70%" height="550" style="margin-bottom: 10px;"
                            src="https://www.youtube.com/embed/exc4RuleOqs?si=8EOt-XPcl4zTnEdS"
                            title="YouTube video player" frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                            referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                    <p style="font-weight: 700;margin-bottom: 20px; display: block; cursor: pointer;"
                       data-fancybox="gallery" data-src="/001.pdf" data-type="pdf">
                        Vệt nắng - chế tác Nguyễn Duy Ngọc
                    </p>
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
                <section class="hero text-center" style="padding-top: 50px">
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
                <section class="hero text-center" style="padding-top: 50px">
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
            <div class="text-center">
                <div class="pagination">
                    <a href="?page=1" class="@if($page == 1) active @endif">1</a>
                    <a href="?page=2" class="@if($page == 2) active @endif">2</a>
                    <a href="?page=3" class="@if($page == 3) active @endif">3</a>
                    <a href="?page=4" class="@if($page == 4) active @endif">4</a>
                    <a href="?page=5" class="@if($page == 5) active @endif">5</a>
                </div>
            </div>

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
        </div>
    @endif
@endsection
