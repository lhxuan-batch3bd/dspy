@extends('backend.master')
@section('title', 'Danh mục sản phẩm')
@section('content')
<div class="table-agile-info">
    <div class="panel panel-default">
        @if(Session('restore_success'))
        <div class="alert alert-success">{{Session('restore_success')}}</div>
        @endif
        <div class="panel-heading">
            Danh mục bị xóa
        </div>
        <div style="text-align:left;" class="table-responsive">
            <table class="table table-striped b-t b-light table-bordered table-hover">
                <thead>
                    <tr>
                        <th>Tên loại</th>
                        <th>Mô tả</th>
                        <th>Hành động</th>
                    </tr>
                </thead>
                @foreach($category as $trash)
                <tbody>
                    <tr>
                        <td>{{$trash->name}}</td>
                        <td>
                            <p>{{$trash->description}}
                                <p>
                        </td>
                        <td>
                            <a href="{{route('restoreCate',$trash->id)}}" ui-toggle-class=""><i class="fa fa-refresh text-success text-active">Restore Deleted</i>
                        </td>
                    </tr>
                </tbody>

                @endforeach

            </table>

        </div>

    </div>

</div>

<style>


    th {
        text-align: center;
    }

</style>
@stop
