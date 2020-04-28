@extends('frontend.layouts')
@section('content')
<div class="inner-header">
    <div class="container">
        <div class="pull-left">
            <h6 class="inner-title">{{$category->name}}</h6>
        </div>
        <div class="pull-right">
            <div class="beta-breadcrumb font-large">
                <a href="{{route('getPage')}}">Trang chủ</a> / <span>Loại sản phẩm</span>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>
<div class="container">
    <div id="content" class="space-top-none">
        <div class="main-content">
            <div class="space60">&nbsp;</div>
            <div class="row">
                <div class="col-sm-3">
                    <ul class="aside-menu">
                        @foreach($cate_product as $cate_prod)
                        <li><a href="{{route('getCategory',$cate_prod->id)}}">{{$cate_prod->name}}</a></li>
                        @endforeach
                    </ul>
                </div>
                <div class="col-sm-9">
                    <div class="beta-products-list">
                        <h4>{{$category->name}}</h4>
                        <div class="beta-products-details">
                            <p class="pull-left">Tìm thấy {{count($category_product)}} sản phẩm</p>
                            <div class="clearfix"></div>
                        </div>
                        <div class="row">
                            @foreach($category_product as $cprod)
                            <div class="col-sm-4">
                                <div class="single-item">
                                    @if($cprod->promotion_price != 0)
                                    <div class="ribbon-wrapper">
                                        <div class="ribbon sale">Sale</div>
                                    </div>
                                    @endif
                                    <div class="single-item-header">
                                        <a href="{{route('getDetailProduct',$cprod->id)}}"><img src="image/products/{{$cprod->image}}" alt="" height="250"></a>
                                    </div>
                                    <div class="single-item-body">
                                        <p class="single-item-title">{{$cprod->name}}</p>
                                        <p class="single-item-price">
                                            @if($cprod->promotion_price == 0)
                                            <span style="font-size:15px" class="flash-sale">{{number_format($cprod->unit_price,0,',','.')}} VND</span>
                                        </p>
                                        @else
                                        <span style="font-size:15px" class="flash-del">{{number_format($cprod->unit_price,0,',','.')}} VND</span>
                                        <span style="font-size:15px" class="flash-sale">{{number_format($cprod->promotion_price,0,',','.')}} VND</span>
                                        @endif
                                    </div>
                                    <div class="single-item-caption">
                                        <a class="add-to-cart pull-left" href="{{route('getAddCart',$cprod->id)}}"><i class="fa fa-shopping-cart"></i></a>
                                        <a class="beta-btn primary" href="{{route('getDetailProduct',$cprod->id)}}">Chi tiết <i class="fa fa-chevron-right"></i></a>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <h4>Sản phẩm khác</h4>
                        <div class="beta-products-details">
                            <p class="pull-left">Tìm thấy {{count($cate_different)}} sản phẩm</p>
                            <div class="clearfix"></div>
                        </div>
                        <div class="row">
                            @foreach($cate_different as $cate_k)
                            <div class="col-sm-4">
                                <div class="single-item">
                                    @if($cate_k->promotion_price != 0)
                                    <div class="ribbon-wrapper">
                                        <div class="ribbon sale">Sale</div>
                                    </div>
                                    @endif
                                    <div class="single-item-header">
                                        <a href="{{route('getDetailProduct',$cate_k->id)}}"><img src="image/products/{{$cate_k->image}}" alt="" height="250px"></a>
                                    </div>
                                    <div class="single-item-body">
                                        <p class="single-item-title">{{$cate_k->name}}</p>
                                        <p class="single-item-price">
                                            @if($cate_k->promotion_price == 0)
                                            <span style="font-size:15px" class="flash-sale">{{number_format($cate_k->unit_price,0,',','.')}} VND</span>
                                        </p>
                                        @else
                                        <span style="font-size:15px" class="flash-del">{{number_format($cate_k->unit_price,0,',','.')}} VND</span>
                                        <span style="font-size:15px" class="flash-sale">{{number_format($cate_k->promotion_price,0,',','.')}} VND</span>
                                        @endif
                                    </div>
                                    <div class="single-item-caption">
                                        <a class="add-to-cart pull-left" href="{{route('getAddCart',$cate_k->id)}}"><i class="fa fa-shopping-cart"></i></a>
                                        <a class="beta-btn primary" href="{{route('getDetailProduct',$cate_k->id)}}">Chi tiết <i class="fa fa-chevron-right"></i></a>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <div class="row">{{$cate_different->links()}}</div>
                    </div> <!-- .beta-products-list -->
                    <div class="space50">&nbsp;</div>
                </div>
            </div> <!-- end section with sidebar and main content -->


        </div> <!-- .main-content -->
    </div> <!-- #content -->
</div> <!-- .container -->
@stop
