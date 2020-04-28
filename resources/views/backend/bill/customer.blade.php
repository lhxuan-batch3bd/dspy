@extends('backend.master')
@section('title', ' Thông tin khách hàng')
@section('content')
<div class="table-agile-info">
    <div class="panel panel-default">
        <div class="panel-heading">
            Thông tin khách hàng
        </div>
        <div style="text-align:left;" class="table-responsive">
            <table class="table table-striped b-t b-light table-bordered table-hover">
                <thead>
                    <tr>
                        <th>Email</th>
                        <th>Tên khách hàng</th>
                        <th>Số điện thoại</th>
                        <th>Đại chỉ</th>
                        <th>Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{$customer->email}}</td>
                        <td>{{$customer->name}}</td>
                        <td>{{$customer->phonenumber}}</td>
                        <td>{{$customer->address}}</td>
                        <td><a href="{{route('getDisplayBill')}}">Quay lại hóa đơn</a></td>
                    </tr>
                </tbody>

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
