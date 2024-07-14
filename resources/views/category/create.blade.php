@extends('layout.main')
@section('content')
<section class="product spad">
    <div class="container">
        <form action="{{route('category.insert')}}" method="POST">
            @csrf
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Tên</label>
              <input type="text" class="form-control" name="name" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <button type="submit" class="btn btn-primary">Thêm</button>
        </form>
        <a href="{{route('category.list')}}" class="btn btn-primary mt-3">Danh sách</a>
    </div>
</section>
@endsection
