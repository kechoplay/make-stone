@extends('layout.main')
@section('content')
<section class="product spad">
    <div class="container">
        <form method="POST" action="{{route('affiliate.update')}}">
            @csrf
            <input type="hidden" value="{{$one->id}}" name="id">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Loại liên kết</label>
                <select class="form-control" name="type">
                    @php
                        $array = ['facebook','tiktok','instagram'];
                        @endphp
                    @foreach ($array as $key => $type)
                    <option value="{{$key+1}}" {{$one->type == $key+1 ? 'selected' : ''}}>{{$type}}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Đường dẫn</label>
              <input type="text" class="form-control" name="link" value="{{$one->link}}" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <button type="submit" class="btn btn-primary">Sửa</button>
        </form>
        <a href="{{route('affiliate.list')}}" class="btn btn-primary mt-3">Danh sách</a>
    </div>
</section>
@endsection
