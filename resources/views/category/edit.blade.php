@extends('layout.main')
@section('content')
<section class="product spad">
    <div class="container">
        <form method="POST" action="{{route('category.update')}}">
            @csrf
            <input type="hidden" value="{{$one->id}}" name="id">
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Tên</label>
              <input type="text" class="form-control" name="name" value="{{$one->name}}" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <button type="submit" class="btn btn-primary">Sửa</button>
        </form>
        <a href="{{route('category.list')}}" class="btn btn-primary mt-3">Danh sách</a>
    </div>
</section>
@endsection
