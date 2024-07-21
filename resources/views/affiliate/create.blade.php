@extends('layout.main')
@section('content')
<section class="product spad">
    <div class="container">
        <form action="{{route('affiliate.insert')}}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label d-block">Loại liên kết</label>
                <select class="form-control" name="type">
                    @php
                        $array = ['facebook','tiktok','instagram'];
                        @endphp
                    @foreach ($array as $key => $one)
                    <option value="{{$key+1}}">{{$one}}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3" style="margin-top: 4rem">
              <label for="exampleInputEmail1" class="form-label d-block">Đường dẫn</label>
              <input type="text" class="form-control" name="link" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <button type="submit" class="btn btn-primary">Thêm</button>
        </form>
        <a href="{{route('affiliate.list')}}" class="btn btn-primary mt-3">Danh sách</a>
    </div>
</section>
@endsection
