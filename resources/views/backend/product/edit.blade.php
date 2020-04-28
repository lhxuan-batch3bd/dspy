@extends('backend.master')
@section('title', 'Danh mục sản phẩm')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                Cập nhật danh mục sản phẩm
            </header>
            <div class="panel-body">
                <div class="position-center">
                    <form role="form" method="post" action="" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên sản phẩm</label>
                            <input type="text" name="name" class="form-control" id="exampleInputEmail1" value="{{$product->name}}">
                            @if ($errors->has('name'))
                            <p class="text-danger">{{ $errors->first('name') }}</p>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Loại sản phẩm</label>
                            <select name="category" class="form-control">
                                @foreach($category as $cate)
                                <option value="{{$cate->id}}" {{$product->id_category==$cate->id ? "Selected='Selected'":''}}>{{$cate->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Mô tả</label>
                            <textarea style="resize: none;" name="desc" class="form-control" id="exampleInputPassword1" value="Password">{{$product->description}}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Giá</label>
                            <input type="text" name="unit_price" class="form-control" id="exampleInputEmail1" value="{{$product->unit_price}}">
                            @if ($errors->has('unit_price'))
                            <p class="text-danger">{{ $errors->first('unit_price') }}</p>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Giá khuyến mãi</label>
                            <input type="text" name="promotion_price" class="form-control" id="exampleInputEmail1" value="{{$product->promotion_price}}">
                            @if ($errors->has('promotion_price'))
                            <p class="text-danger">{{ $errors->first('promotion_price') }}</p>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Status sale</label>
                            <input type="text" name="status" class="form-control" id="exampleInputEmail1" value="{{$product->status}}">
                            @if ($errors->has('status'))
                            <p class="text-danger">{{ $errors->first('status') }}</p>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Hình ảnh</label>
                            <input type="file" name="image" class="form-control" id="exampleInputEmail1">
                            <img src="uploads/products/{{$product->image}}" height="100" width="100">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Đóng gói</label>
                            <input type="text" name="unit" class="form-control" id="exampleInputEmail1" value="{{$product->unit}}">
                            @if ($errors->has('unit'))
                            <p class="text-danger">{{ $errors->first('unit') }}</p>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Đặc sắc</label>
                            <input type="text" name="featured" class="form-control" id="exampleInputEmail1" value="{{$product->featured}}">
                            @if ($errors->has('featured'))
                            <p class="text-danger">{{ $errors->first('featured') }}</p>
                            @endif
                        </div>
                        <button type="submit" class="btn btn-info">Sửa</button>
                    </form>
                </div>
            </div>
        </section>
    </div>
</div>
@endsection
