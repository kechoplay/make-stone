@extends('layout.main')
@section('content')
    @if($page == 1)
        <div class="image-main">
            <div style="width: 70%; margin: 0 auto; position: relative">
                <img class="img-main" src="/img/wrapper.png?version={{ config('phohien.version') }}">
                <img class="img-sub" id="img-sub" src="/img/sub-img.png?version={{ config('phohien.version') }}"
                     onclick="openAudio()">
            </div>
        </div>
        <div class="text-center">
            <div class="pagination">
                @foreach(range(1, $totalPage) as $pages)
                    <a href="?page={{ $pages }}" class="@if($page == $pages) active @endif">{{ $pages }}</a>
                @endforeach
            </div>
        </div>
    @else
        <div style="background-image: url('/img/bg.jpg'); background-size: 100% 100%;" class="main-bg">
            @if($page == 2)
                <section class="hero text-center">
                    @foreach($videoFirstPage as $video)
                        {!! $video->iframe !!}
                    @endforeach
                </section>
            @endif
            @if($page >= 3)
                <section class="hero text-center">
                    @foreach($videoNextPage as $video)
                        {!! $video->iframe !!}
                        <div style="background: #FFFFFF; width: 70%; margin: 0 auto">
                            @if($video->image)
                                <p style="font-weight: 700;margin-bottom: 20px; display: block; cursor: pointer;"
                                   data-fancybox="gallery" data-src="/001.pdf" data-type="pdf">
                                    {{ $video->name }}
                                </p>
                            @else
                                <p style="font-weight: 700;margin-bottom: 20px; display: block; cursor: pointer;">
                                    {{ $video->name }}
                                </p>
                            @endif
                        </div>
                    @endforeach
                </section>
            @endif
            <div class="text-center">
                <div class="pagination">
                    @foreach(range(1, $totalPage) as $pages)
                        <a href="?page={{ $pages }}" class="@if($page == $pages) active @endif">{{ $pages }}</a>
                    @endforeach
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
