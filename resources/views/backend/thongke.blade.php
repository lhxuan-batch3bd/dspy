@extends('backend.master')
@section('title', 'Thống kê')
@section('content')
<div class="market-updates">
    <div class="col-md-3 market-update-gd">
        <div class="market-update-block clr-block-2">
            <div class="col-md-4 market-update-right">
                <i class="fa fa-eye"> </i>
            </div>
            <div class="col-md-8 market-update-left">
                <h4>Danh mục</h4>
                <h3>{{$category_count}}</h3>
                <p>Số danh mục</p>
            </div>
            <div class="clearfix"> </div>
        </div>
    </div>
    <div class="col-md-3 market-update-gd">
        <div class="market-update-block clr-block-1">
            <div class="col-md-4 market-update-right">
                <i class="fa fa-users"></i>
            </div>
            <div class="col-md-8 market-update-left">
                <h4>Tài khoản</h4>
                <h3>{{$user_count}}</h3>
                <p>Số tài khoản</p>
            </div>
            <div class="clearfix"> </div>
        </div>
    </div>
    <div class="col-md-3 market-update-gd">
        <div class="market-update-block clr-block-3">
            <div class="col-md-4 market-update-right">
                <i class="fa fa-usd"></i>
            </div>
            <div class="col-md-8 market-update-left">
                <h4>Sản phẩm</h4>
                <h3>{{$product_count}}</h3>
                <p>Số sản phẩm</p>
            </div>
            <div class="clearfix"> </div>
        </div>
    </div>
    <div class="col-md-3 market-update-gd">
        <div class="market-update-block clr-block-4">
            <div class="col-md-4 market-update-right">
                <i class="fa fa-shopping-cart" aria-hidden="true"></i>
            </div>
            <div class="col-md-8 market-update-left">
                <h4>Đơn hàng</h4>
                <h3>{{$order_count}}</h3>
                <p>Số lượt đặt hàng</p>
            </div>
            <div class="clearfix"> </div>
        </div>
    </div>
    <div class="clearfix"> </div>
    <br>
    {{$customer_order->links()}}
    <div class="panel-heading">
        Đơn hàng mới
    </div>

    <div class="table-agile-info">
        <div style="text-align:left;" class="table-responsive">
            <table class="table table-striped b-t b-light table-bordered table-hover">
                <thead>
                    <tr>
                        <th>Số hóa đơn</th>
                        <th>Tên khách hàng</th>
                        <th>Sản phẩm</th>
                        <th>Hình ảnh</th>
                        <th>Số lượng</th>
                        <th>Ngày đặt</th>
                        <th>Phương thức thanh toán</th>
                        <th>Thành tiền</th>

                    </tr>
                </thead>
                @foreach($customer_order as $order)
                <tbody>
                    <tr>
                        <td>#{{$order->id_bill ?? 'no bill'}}</td>
                        <td>{{$order->bill->customer->name ?? 'no bill'}}</td>
                        <td>{{$order->product->name ??'no product'}}</td>
                        <td><img src="uploads/products/{{$order->product->image}}" height="100" width="100"></td>
                        <td>{{$order->quantity}}</td>
                        <td>{{$order->bill->dateorder ?? 'no day'}}</td>
                        <td>{{$order->bill->payment ?? 'no day'}}</td>
                        <td>{{number_format($order->price,0,',','.')}} VND</td>
                    </tr>
                </tbody>
                @endforeach
            </table>
        </div>
    </div>
    <br>
    {{$customer_order->links()}}
    @stop
