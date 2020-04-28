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
                    <form role="form" method="post" action="{{route('postEditCate',$category->id)}}">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên loại</label>
                            <input type="text" name="name" class="form-control" id="exampleInputEmail1" value="{{$category->name}}">
                            @if ($errors->has('update_name'))
                            <p class="text-danger">{{ $errors->first('name') }}</p>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Mô tả</label>
                            <textarea style="resize: none;" name="desc" class="form-control" required="" id="exampleInputPassword1">{{$category->description}}</textarea>
                        </div>
                        <button type="submit" class="btn btn-info">Sửa</button>
                    </form>
                </div>
            </div>
        </section>
    </div>
</div>
@endsection
