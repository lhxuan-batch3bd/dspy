@extends('backend.master')
@section('title', 'Danh mục sản phẩm')
@section('content')
<div class="table-agile-info">
    <div class="panel panel-default">
        @if(Session('restore_success'))
        <div class="alert alert-success">{{Session('restore_success')}}</div>
        @endif
        <div class="panel-heading">
            Hóa đơn bị xóa
        </div>
        <div style="text-align:left;" class="table-responsive">
            <table class="table table-striped b-t b-light table-bordered table-hover">
                <thead>
                    <tr>
                        <th>Tên khách hàng</th>
                        <th>Tổng tiền</th>
                        <th>Ngày đặt</th>
                        <th>Hành động</th>
                    </tr>
                </thead>
                @foreach($bill as $trash)
                <tbody>
                    <tr>
                        <td>{{$trash->customer->name ?? 'no cus'}}</td>
                        <td>{{$trash->total}}</td>
                        <td>{{$trash->dateorder}}</td>
                        <td>
                            <a href="{{route('restoreBill',$trash->id)}}" ui-toggle-class=""><i class="fa fa-refresh text-success text-active">Restore Deleted</i>
                        </td>
                    </tr>
                </tbody>

                @endforeach

            </table>

        </div>

    </div>

</div>

<style>
    p {
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
