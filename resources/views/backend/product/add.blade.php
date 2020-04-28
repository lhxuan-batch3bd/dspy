@extends('backend.master')
@section('title', 'Sản phẩm')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                Thêm sản phẩm
            </header>
            <div class="panel-body">
                @if(Session('upload_error'))
                <div class="alert alert-danger">{{Session('upload_error')}}</div>
                @endif
                @if(Session('add_success'))
                <div class="alert alert-danger">{{Session('add_success')}}</div>
                @endif
                <div class="position-center">
                    <form role="form" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên sản phẩm</label>
                            <input type="text" name="name" class="form-control" id="exampleInputEmail1">
                            @if ($errors->has('name'))
                            <p class="text-danger">{{ $errors->first('name') }}</p>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Loại sản phẩm</label>
                            <select name="category" class="form-control">
                                @foreach($category as $cate)
                                <option value="{{$cate->id}}">{{$cate->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Mô tả</label>
                            <textarea style="resize: none;" name="desc" class="form-control" id="exampleInputPassword1"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail8">Giá</label>
                            <input type="text" name="unit_price" class="form-control" id="exampleInputEmail8">
                            @if ($errors->has('unit_price'))
                            <p class="text-danger">{{ $errors->first('unit_price') }}</p>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail2">Giá khuyến mãi</label>
                            <input type="text" name="promotion_price" class="form-control" id="exampleInputEmail2">
                            @if ($errors->has('promotion_price'))
                            <p class="text-danger">{{ $errors->first('promotion_price') }}</p>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail3">Status sale</label>
                            <input type="text" name="status" class="form-control" id="exampleInputEmail3" placeholder="Hiển thị: 1 - Ẩn : 0">
                            @if ($errors->has('status'))
                            <p class="text-danger">{{ $errors->first('status') }}</p>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail4">Hình ảnh</label>
                            <input type="file" name="image" class="form-control" id="exampleInputEmail4" required="">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail5">Đóng gói</label>
                            <input type="text" name="unit" class="form-control" id="exampleInputEmail5">
                            @if ($errors->has('unit'))
                            <p class="text-danger">{{ $errors->first('unit') }}</p>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail6">Đặc sắc</label>
                            <input type="text" name="featured" class="form-control" id="exampleInputEmail6" placeholder="Hiển thị: 1 - Ẩn : 0">
                            @if ($errors->has('featured'))
                            <p class="text-danger">{{ $errors->first('featured') }}</p>
                            @endif
                        </div>
                        <button type="submit" class="btn btn-info">Thêm</button>
                    </form>
                </div>
            </div>
        </section>
    </div>
</div>
@endsection
