@extends('backend.master')
@section('title', 'Sản phẩm')
@section('content')
<ul class="nav pull-right top-menu">
    <li>
        <form role="search" method="get" id="searchform" action="{{route('getSearch')}}">
            <input  name="key" type="text" class="form-control search" placeholder=" Search">
        </form>
    </li>
</ul>
<div class="table-agile-info">

    <div class="panel panel-default">

        @if(Session('update_success'))
        <div class="alert alert-success">{{Session('update_success')}}</div>
        @endif
        @if(Session('add_success'))
        <div class="alert alert-success">{{Session('add_success')}}</div>
        @endif
        @if(Session('delete_success'))
        <div class="alert alert-success">{{Session('delete_success')}}</div>
        @endif
        @if(Session('restore_success'))
        <div class="alert alert-success">{{Session('restore_success')}}</div>
        @endif

        <div class="panel-heading">
            Tìm thấy {{count($product)}} sản phẩm
        </div>

        <div style="text-align:left;" class="table-responsive">
            <table class="table table-striped b-t b-light table-bordered table-hover">
                <thead>
                    <tr>
                        <th>Tên sản phẩm</th>
                        <th>Loại sản phẩm</th>
                        <th>Mô tả</th>
                        <th>Giá</th>
                        <th>Giá sale</th>
                        <th>Status</th>
                        <th>Hình ảnh</th>
                        <th>Bao bì</th>
                        <th>Đặc sắc</th>
                        <th>Ngày thêm</th>

                        <th colspan="2">Hành động</th>
                    </tr>
                </thead>
                @foreach($product as $pd)
                <tbody>
                    <tr>
                        <td>{{$pd->name}}</td>
                        <td>{{$pd->category->name ?? 'no category'}}</td>
                        <td>
                            <p id="p1">{{$pd->description}}
                                <p>
                        </td>
                        <td>{{number_format($pd->unit_price,0,',',',')}}đ</td>
                        <td>{{number_format($pd->promotion_price,0,',','.')}}đ</td>
                        <td>{{$pd->status}}</td>
                        <td><img src="uploads/products/{{$pd->image}}" height="100" width="100"></td>
                        <td>{{$pd->unit}}</td>
                        <td>{{$pd->featured}}</td>
                        <td>{{$pd->created_at}}</td>

                        <td>
                            <a href="{{route('getEditProd',$pd->id)}}" ui-toggle-class=""><i class="fa fa-edit text-success text-active">Sửa</i>
                        </td>

                        <td>
                            <a href="{{route('getDeleteProd',$pd->id)}}" onclick="return confirm('Bạn có chắc muốn xóa sản phẩm?')"><i class="fa fa-times text-danger text">Xóa</i></a>
                        </td>

                    </tr>
                </tbody>

                @endforeach

            </table>

        </div>

    </div>

</div>

<style>
    #p1 {
        margin-left: 30px;
        width: 20px;
        overflow: hidden;
        white-space: nowrap;
        text-overflow: ellipsis;
    }

    th {
        text-align: center;
    }

</style>
@stop
