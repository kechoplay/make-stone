@extends('layout.main')
@section('content')
<section class="product spad">
    <div class="container">
        <form action="{{route('setting.update')}}" method="POST">
            @csrf
            <input type="hidden" name="id" value="{{$one->id}}">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Loại cài đặt</label>
                <select class="form-control" name="type">
                    @php
                        $array = ['banner','same photo'];
                        @endphp
                    @foreach ($array as $key => $type)
                    <option value="{{$key+1}}" {{$key + 1 == $one->type}}>{{$type}}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Đường dẫn</label>
              <input type="text" class="form-control" name="url" value="{{$one->url}}" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <div class="custom-control custom-switch mb-3">
                <input type="checkbox" class="custom-control-input" name="enable" {{$one->enable ? 'checked' : ''}} id="customSwitch1">
                <label class="custom-control-label" for="customSwitch1">Kích hoạt</label>
            </div>
            <button type="submit" class="btn btn-primary">Sửa</button>
        </form>
        <a href="{{route('setting.list')}}" class="btn btn-primary mt-3">Danh sách</a>
    </div>
</section>
@endsection
