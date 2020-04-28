@extends('frontend.layouts')
@section('content')

<script type="text/javascript">
    function updateCart(qty, rowId) {
        $.get('{{route('updateCart')}}', {
                qty: qty
                , rowId: rowId
            }
            , function() {
                location.reload();
            }
        )
    }

</script>
<div class="">
    <div id="content">
        <div id="list-cart">
            <h3>Giỏ hàng</h3>
            @if( Cart::count() >= 1)
            <form class="beta-form-checkout" action="{{route('BuyCart')}}" method="post" enctype="multipart/form-data">
                @csrf
                <table class="table table-bordered .table-responsive text-center">
                    <tr class="active">
                        <td width="11.111%">Ảnh mô tả</td>
                        <td width="22.222%">Tên sản phẩm</td>
                        <td width="22.222%">Số lượng</td>
                        <td width="16.6665%">Đơn giá</td>
                        <td width="16.6665%">Thành tiền</td>
                        <td width="11.112%">Xóa</td>
                    </tr>
                    @foreach($data as $item)
                    <tr>
                        <td><img class="img-responsive" src="image/products/{{$item->options->img}}"></td>
                        <td class="single-item-title">{{$item->name}}</td>
                        <td>
                            <div class="form-group">
                                <input class="form-control" type="number" value="{{$item->qty}}" onchange="updateCart(this.value,'{{$item->rowId}}')">
                            </div>
                        </td>
                        <td><span class="flash-sale">{{number_format($item->price,0,',','.')}} VND</span></td>
                        <td><span class="flash-sale">{{number_format($item->price * $item->qty,0,',','.')}} VND</span></td>
                        <td><a href="{{route('getDelCart',$item->rowId)}}"><i class="fa fa-trash" aria-hidden="true"></i>Xóa</a></td>
                    </tr>
                    @endforeach
                </table>
                <div class="row" id="total-price">
                    <div style="font-weight: bold;font-size: 20px; color:red;" class="col-md-6 col-sm-12 col-xs-12">
                        Tổng thanh toán: <span class="total-price">{{$total}} VND</span>

                    </div>
                    <div class="col-md-6 col-sm-12 col-xs-12">
                        <a href="{{route('getPage')}}" class="btn btn-warning">Mua tiếp</a>
                        <a href="{{route('getDelCart','all')}}" class="btn btn-danger">Xóa giỏ hàng</a>
                    </div>
                </div>
            </form>
        </div>
        <div id="xac-nhan">
            <h3>Xác nhận mua hàng</h3>
            <form class="beta-form-checkout" action="{{route('BuyCart')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="email">Email address:</label>
                    <input type="email" class="form-control" id="email" name="email">
                    @if ($errors->has('email'))
                    <p class="text-danger">{{ $errors->first('email') }}</p>
                    @endif
                </div>
                <div class="form-group">
                    <label for="name">Họ và tên:</label>
                    <input type="text" class="form-control" id="name" name="name">
                    @if ($errors->has('name'))
                    <p class="text-danger">{{ $errors->first('name') }}</p>
                    @endif
                </div>
                <div class="form-group">
                    <label for="phone">Số điện thoại:</label>
                    <input type="number" class="form-control" id="phone" name="phone">
                    @if ($errors->has('phone'))
                    <p class="text-danger">{{ $errors->first('phone') }}</p>
                    @endif
                </div>
                <div class="form-group">
                    <label for="add">Địa chỉ:</label>
                    <input type="text" class="form-control" id="add" name="address">
                    @if ($errors->has('address'))
                    <p class="text-danger">{{ $errors->first('address') }}</p>
                    @endif
                </div>
                <div class="your-order-head">
                    <h5>Hình thức thanh toán</h5>
                </div>
                <div class="your-order-body">
                    <ul class="payment_methods methods">
                        <li class="payment_method_bacs">
                            <input id="payment_method_bacs" type="radio" class="input-radio" name="payment_method" value="COD" checked="checked" data-order_button_text="">
                            <label for="payment_method_bacs">Thanh toán khi nhận hàng </label>
                            <div class="payment_box payment_method_bacs" style="display: block;">
                                Cửa hàng sẽ gửi hàng đến địa chỉ của bạn, bạn xem hàng rồi thanh toán tiền cho nhân viên giao hàng
                            </div>
                        </li>

                        <li class="payment_method_cheque">
                            <input id="payment_method_cheque" type="radio" class="input-radio" name="payment_method" value="ATM" data-order_button_text="">
                            <label for="payment_method_cheque">Chuyển khoản </label>
                            <div class="payment_box payment_method_cheque" style="display: block;">
                                Chuyển tiền đến tài khoản sau:
                                <br>- Số tài khoản: 123 456 789
                                <br>- Chủ TK: Nguyễn A
                                <br>- Ngân hàng ACB, Chi nhánh TPHCM
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="form-group text-right">
                    <button type="submit" href="{{route('BuyCart')}}" class="btn btn-default">Thực hiện đơn hàng</button>
                </div>
            </form>
        </div>
    </div>
</div>
@else
<h2 class="text text-success">Giỏ hàng của bạn rỗng</h2>
@endif
<div style="margin-bottom:20px"></div>
@stop
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
