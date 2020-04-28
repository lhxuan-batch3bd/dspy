@extends('backend.master')
@section('title', 'Danh mục sản phẩm')
@section('content')
<div class="table-agile-info">
    <div class="panel panel-default">
        @if(Session()->has('add_success'))
        <div class="alert alert-success">{{Session('add_success')}}</div>
        @endif
        @if(Session('update_success'))
        <div class="alert alert-success">{{Session('update_success')}}</div>
        @endif
        @if(Session('restore_success'))
        <div class="alert alert-success">{{Session('restore_success')}}</div>
        @endif
        @if(Session('delete_success'))
        <div class="alert alert-success">{{Session('delete_success')}}</div>
        @endif
        <div class="panel-heading">
            Danh mục sản phẩm
        </div>
        <div style="text-align:left;" class="table-responsive">
            <table class="table table-striped b-t b-light table-bordered table-hover">
                <thead>
                    <tr>
                        <th>Tên loại</th>
                        <th>Mô tả</th>
                        <th colspan="2">Hành động</th>
                    </tr>
                </thead>
                @foreach($category as $cate)
                <tbody>
                    <tr>
                        <td>{{$cate->name}}</td>
                        <td>
                            <p id="p1">{{$cate->description}}
                                <p>
                        </td>
                        <td>
                            <a href="{{route('getEditCate',$cate->id)}}" ui-toggle-class=""><i class="fa fa-edit text-success text-active">Sửa</i></a>
                        </td>

                        <td>
                            <a href="{{route('getDeleteCate',$cate->id)}}" onclick="return confirm('Bạn có chắc muốn xóa danh mục?')"><i class="fa fa-times text-danger text">Xóa</i></a>
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
        width: 400px;
        overflow: hidden;
        white-space: nowrap;
        text-overflow: ellipsis;
    }

    th {
        text-align: center;
    }

</style>
@stop
