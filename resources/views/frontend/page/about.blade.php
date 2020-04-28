@extends('frontend.layouts')
@section('content')
<div class="inner-header">
    <div class="container">
        <div class="pull-left">
            <h6 class="inner-title">Giới thiệu</h6>
        </div>
        <div class="pull-right">
            <div class="beta-breadcrumb font-large">
                <a href="{{route('getPage')}}">Trang chủ</a> / <span>Giới thiệu</span>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>
<div class="container">
    <div id="content">
        <div class="row">
            <div class="col-sm-5">
                <img src="assets/dest/images/phu-yen.jpg" alt="">
            </div>
            <div class="col-sm-7">
                <h5 class="other-title">Phú Yên Specialties</h5>
                <div class="space20">&nbsp;</div>
                <p>Chuyên cung cấp thực phẩm và ẩm thực với nhiều vùng trong tỉnh như Tuy An, Sơn Hòa, .. và các sản phẩm liên quan. Với mong muốn đáp ứng nhu cầu của khách hàng để thưởng thức các món ăn ngon, bổ dưỡng, giá rẻ, đặc sản PY liên tục cập nhật sản phẩm của họ. Do đó, khi đến với chúng tôi, bạn sẽ luôn được chiêm ngưỡng những sản phẩm mới và chất lượng. Ngoài ra, chế độ chăm sóc khách hàng chu đáo của chúng tôi sẽ khiến bạn hài lòng hơn khi mua hoặc cần tư vấn. Đặc sản PY đừng ngần ngại mang sản phẩm đến nhà bạn nếu bạn cần. Đồng thời, chúng tôi sẵn sàng trở thành nhà cung cấp cho các đại lý và các cửa hàng khác với giá cả hợp lý.</p>
            </div>
        </div>
    </div>
    <!-- #content -->
</div>
<!-- .container -->
@endsection
