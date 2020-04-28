@extends('frontend.layouts')
@section('content')
<div id="container">
    <div id="content">
        <p class="info">Quý khách đã đặt hàng thành công!</p>
        <p>• Hóa đơn mua hàng của Quý khách đã được chuyển đến Địa chỉ Email có trong phần Thông tin Khách hàng của chúng Tôi</p>
        <p>• Sản phẩm của Quý khách sẽ được chuyển đến Địa có trong phần Thông tin Khách hàng của chúng Tôi sau thời gian 2 đến 3 ngày, tính từ thời điểm này.</p>
        <p>• Nhân viên giao hàng sẽ liên hệ với Quý khách qua Số Điện thoại trước khi giao hàng 24 tiếng</p>
        <p>• Trụ sở chính: 64 Nguyễn Chí Thanh - Tuy Hòa - Phú Yên</p>
        <p>Cám ơn Quý khách đã sử dụng Sản phẩm của Công ty chúng Tôi!</p>
    </div>
    <p class="btn btn-danger"><a href="{{route('getPage')}}">Quay lại trang chủ</a></p>
</div>
@stop
{{-- <style>
    #complete {
        margin-top: 15px;
        border: 1px solid #6c0;
        padding: 10px 10px;
    }

    #complete p {
        color: #6c0;
        text-align: justify;
    }

</style> --}}
