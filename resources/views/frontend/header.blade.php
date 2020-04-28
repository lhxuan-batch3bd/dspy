<div id="header">
    <div class="header-top">
        <div class="container">
            <div class="pull-left auto-width-left">
                <ul class="top-menu menu-beta l-inline">
                    <li><a href="{{route('getContact')}}"><i class="fa fa-home"></i> 64, Nguyễn Chí Thanh, Phường 7, Tuy Hòa, Phú Yên</a></li>
                    <li><a><i class="fa fa-phone"></i>038 561 8501</a></li>
                </ul>
            </div>
            <div class="pull-right auto-width-right">
                <ul class="top-details menu-beta l-inline">
                    @if(Auth::check())
                    <li><a>
                            @if( Auth::user()->level == 1)
                            {{ "Quản trị viên" }}
                            @elseif( Auth::user()->level == 2)
                            {{ "Thành viên" }}
                            @endif
                        </a>
                    </li>
                    <li><a href="{{route('getUserSetting', Auth::user()->id)}}">{{Auth::user()->email}}<i class="fas fa-user-cog"></i></a></li>
                    <li><a href="{{route('getLogout')}}"><i class="fa fa-sign-out-alt"></i>Đăng xuất</a></li>
                    @else
                    <li><a href="{{route('getRegister')}}">Đăng kí</a></li>
                    <li><a href="{{route('getLogin')}}">Đăng nhập</a></li>

                    @endif
                </ul>
            </div>
            <div class="clearfix"></div>
        </div> <!-- .container -->
    </div> <!-- .header-top -->
    <div class="header-body">
        <div class="container beta-relative">
            <div class="pull-left">
                <a href="{{route('getPage')}}" id="logo"><img src="assets/dest/images/dac-san-phu-yen.png" width="200px" alt=""></a>
            </div>
            <div class="pull-right beta-components space-left ov">
                <div class="space10">&nbsp;</div>
                <div class="beta-comp">
                    <form role="search" method="get" id="searchform" action="{{route('timkiem')}}">
                        <input type="text" value="" name="key" id="s" placeholder="Nhập từ khóa..." />
                        <button class="fa fa-search" type="submit" id="searchsubmit"></button>
                    </form>
                </div>
                @if(Auth::check())
                <div class="beta-comp">
                    <div class="cart">
                        <div><a href="{{route('getCartDetail')}}"><i class="fa fa-shopping-cart"></i>
                                @if(Cart::count()>=1)
                                Giỏ hàng({{Cart::count()}})
                                @else
                                Giỏ hàng(Rỗng)
                                @endif
                            </a></div>
                    </div> <!-- .cart -->
                </div>
                @endif
            </div>
            <div class="clearfix"></div>
        </div> <!-- .container -->
    </div> <!-- .header-body -->
    <div class="header-bottom" style="background-color: #0277b8;">
        <div class="container">
            <a class="visible-xs beta-menu-toggle pull-right" href="#"><span class='beta-menu-toggle-text'>Menu</span> <i class="fa fa-bars"></i></a>
            <div class="visible-xs clearfix"></div>
            <nav class="main-menu">
                <ul class="l-inline ov">
                    <li><a href="{{route('getPage')}}">Trang chủ</a></li>
                    <li><a>Loại sản phẩm</a>
                        <ul class="sub-menu">
                            @foreach($cate_product as $cate)
                            <li><a href="{{route('getCategory',$cate->id)}}">{{$cate->name}}</a></li>
                            @endforeach
                        </ul>
                    </li>
                    <li><a href="{{route('getAbout')}}">Giới thiệu</a></li>
                    <li><a href="{{route('getContact')}}">Liên hệ</a></li>
                </ul>
                <div class="clearfix"></div>
            </nav>
        </div> <!-- .container -->
    </div> <!-- .header-bottom -->
</div>

