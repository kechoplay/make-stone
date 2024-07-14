@extends('layout.main')
@section('content')
    <section class="product spad">
        <div class="container">
            <form action="{{ route('product.insert') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-6">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Ảnh chính</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Upload</span>
                                </div>
                                <div class="custom-file">
                                    <input type="file" accept="image/*" name="main_image" class="custom-file-input" id="inputGroupFile01">
                                    <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Ảnh thumb</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Upload</span>
                                </div>
                                <div class="custom-file">
                                    <input type="file" accept="image/*" name="sub_image[]" multiple class="custom-file-input"
                                        id="inputGroupFile01">
                                    <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Tên sản phẩm</label>
                            <input type="text" class="form-control" name="name" id="exampleInputEmail1"
                                aria-describedby="emailHelp">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Giá</label>
                            <input type="number" min="0" class="form-control" name="price" id="exampleInputEmail1"
                                aria-describedby="emailHelp">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="row">
                            <div class="col-12">
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Số lượng</label>
                                    <input type="number" min="0" class="form-control" name="quantity"
                                        id="exampleInputEmail1" aria-describedby="emailHelp">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Danh mục</label>
                                    <select class="form-control" name="category_id">
                                        @foreach ($listCategory as $key => $one)
                                            <option value="{{ $one->id }}">{{ $one->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-12 mt-3 ">
                                <button type="submit" class="btn btn-primary">Thêm</button>
                                <a href="{{ route('product.list') }}" class="btn btn-primary ml-3">Danh sách</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Mô tả</label>
                            <textarea name="description" class="form-control" name="description" id="" cols="30" rows="10"></textarea>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
@endsection
