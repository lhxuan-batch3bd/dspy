@extends('backend.master')
@section('title', 'Hóa đơn')
@section('content')
<div class="table-agile-info">
    {{$bill->links()}}
    <div class="panel panel-default">
        @if(Session('restore_success'))
        <div class="alert alert-success">{{Session('restore_success')}}</div>
        @endif
        @if(Session('delete_success'))
        <div class="alert alert-success">{{Session('delete_success')}}</div>
        @endif
        <div class="panel-heading">
            Hóa đơn
        </div>

        <div style="text-align:left;" class="table-responsive">
            <table class="table table-striped b-t b-light table-bordered table-hover">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Tên khách hàng</th>
                        <th>Tổng tiền</th>
                        <th>Ngày đặt</th>
                        <th>Hình thức thanh toán</th>
                        <th colspan="3">Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($bill as $b)
                    <tr>
                        <td>#{{$b->id}}</td>
                        <td>{{$b->customer->name ?? 'no cus'}}</td>
                        <td>{{$b->total}}</td>
                        <td>{{$b->dateorder}}</td>
                        <td>{{$b->payment}}</td>
                        <td>
                            <a href="{{route('getCustomer',$b->id_customer)}}">Thông tin khách hàng</a>
                        </td>
                        <td>
                            <a href="{{route('getBillDetail',$b->id)}}">Chi tiết hóa đơn</a>
                        </td>
                        <td>
                            <a href="{{route('getDeleteBill',$b->id)}}" onclick="return confirm('Bạn có chắc muốn xóa hóa đơn?')"><i class="fa fa-times text-danger text">Xóa</i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    {{$bill->links()}}
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
