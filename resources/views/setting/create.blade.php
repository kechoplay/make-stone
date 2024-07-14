@extends('layout.main')
@section('content')
<section class="product spad">
    <div class="container">
        <form action="{{route('setting.insert')}}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Loại cài đặt</label>
                <select class="form-control" name="type">
                    @php
                        $array = ['banner','same photo'];
                        @endphp
                    @foreach ($array as $key => $one)
                    <option value="{{$key+1}}">{{$one}}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Đường dẫn</label>
              <input type="text" class="form-control" name="url" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <div class="custom-control custom-switch mb-3">
                <input type="checkbox" class="custom-control-input" name="enable" id="customSwitch1">
                <label class="custom-control-label" for="customSwitch1">Kích hoạt</label>
            </div>
            <button type="submit" class="btn btn-primary">Thêm</button>
        </form>
        <a href="{{route('setting.list')}}" class="btn btn-primary mt-3">Danh sách</a>
    </div>
</section>
@endsection
