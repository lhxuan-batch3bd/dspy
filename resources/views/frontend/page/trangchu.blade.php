@extends('frontend.layouts')
@section('content')
<div class="rev-slider">
    @include('frontend/slider')
    <!--slider-->
</div>
<div class="container">
    <div id="content" class="space-top-none">
        <div class="main-content">
            @if(Session('update_success'))
            <div class="text-success">{{Session('update_success')}}</div>
            @endif
            <div class="space60">&nbsp;</div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="beta-products-list">
                        <h4>Sản phẩm mới</h4>
                        <div class="beta-products-details">
                            <p class="pull-left">Tìm thấy {{count($product_new)}} sản phẩm</p>
                            <div class="clearfix"></div>
                        </div>
                        <div class="row">
                            @foreach($product_new as $new)
                            <div class="col-sm-3">
                                <div class="single-item">
                                    @if($new->promotion_price != 0)
                                    <div class="ribbon-wrapper">
                                        <div class="ribbon sale">Sale</div>
                                    </div>
                                    @endif
                                    <div class="single-item-header">
                                        <a href="{{route('getDetailProduct',$new->id)}}"><img src="image/products/{{$new->image}}" alt="" height="250px"></a>
                                    </div>
                                    <div class="single-item-body">
                                        <p class="single-item-title">{{$new->name}}</p>
                                        <p class="single-item-price">
                                            @if($new->promotion_price == 0)
                                            <span style="font-size:15px" class="flash-sale">{{number_format($new->unit_price,0,',','.')}} VND</span>
                                        </p>
                                        @else
                                        <span style="font-size:15px" class="flash-del">{{number_format($new->unit_price,0,',','.')}} VND</span>
                                        <span style="font-size:15px" class="flash-sale">{{number_format($new->promotion_price,0,',','.')}} VND</span>
                                        @endif
                                    </div>
                                    <div class="single-item-caption">
                                        <a class="add-to-cart pull-left" href="{{route('getAddCart',$new->id)}}"><i class="fa fa-shopping-cart"></i></a>
                                        <a class="beta-btn primary" href="{{route('getDetailProduct',$new->id)}}">Chi tiết<i class="fa fa-chevron-right"></i></a>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <div class="row">{{$product_new->appends(Request::all())->links()}}</div>
                    </div> <!-- .beta-products-list -->
                    <div class="space50">&nbsp;</div>
                    <div class="beta-products-list">
                        <h4>Sản phẩm nổi bật</h4>
                        <div class="beta-products-details">
                            <p class="pull-left">Tìm thấy {{count($product_featured)}} sản phẩm</p>
                            <div class="clearfix"></div>
                        </div>
                        <div class="row">
                            @foreach($product_featured as $featured)
                            <div class="col-sm-3">
                                <div class="single-item">
                                    @if($new->promotion_price != 0)
                                    <div class="ribbon-wrapper">
                                        <div class="ribbon sale">Sale</div>
                                    </div>
                                    @endif
                                    <div class="single-item-header">
                                        <a href="{{route('getDetailProduct',$featured->id)}}"><img src="image/products/{{$featured->image}}" alt="" height="250px"></a>
                                    </div>
                                    <div class="single-item-body">
                                        <p class="single-item-title">{{$featured->name}}</p>
                                        <p class="single-item-price">
                                            @if($featured->promotion_price == 0)
                                            <span style="font-size:15px" class="flash-sale">{{number_format($featured->unit_price,0,',','.')}} VND</span>
                                        </p>
                                        @else
                                        <span style="font-size:15px" class="flash-del">{{number_format($featured->unit_price,0,',','.')}} VND</span>
                                        <span style="font-size:15px" class="flash-sale">{{number_format($featured->promotion_price,0,',','.')}} VND</span>
                                        @endif
                                    </div>
                                    <div class="single-item-caption">
                                        <a class="add-to-cart pull-left" href="{{route('getAddCart',$featured->id)}}"><i class="fa fa-shopping-cart"></i></a>
                                        <a class="beta-btn primary" href="{{route('getDetailProduct',$featured->id)}}">Chi tiết <i class="fa fa-chevron-right"></i></a>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <div clasas="row">{{$product_featured->appends(Request::all())->links()}}</div>
                        <div class="space40">&nbsp;</div>
                        <h4>Sản phẩm khuyến mãi</h4>
                        <div class="beta-products-details">
                            <p class="pull-left">Tìm thấy {{count($product_sale)}} sản phẩm</p>
                            <div class="clearfix"></div>
                        </div>
                        <div class="row">
                            @foreach($product_sale as $sale)
                            <div class="col-sm-3">
                                <div class="single-item">
                                    <div class="ribbon-wrapper">
                                        <div class="ribbon sale">Sale</div>
                                    </div>
                                    <div class="single-item-header">
                                        <a href="{{route('getDetailProduct',$sale->id)}}"><img src="image/products/{{$sale->image}}" alt="" height="250px"></a>
                                    </div>
                                    <div class="single-item-body">
                                        <p class="single-item-title">{{$sale->name}}</p>
                                        <p class="single-item-price">
                                            <span style="font-size:15px" class="flash-del">{{number_format($sale->unit_price,0,',','.')}} VND</span>
                                            <span style="font-size:15px" class="flash-sale">{{number_format($sale->promotion_price,0,',','.')}} VND</span>
                                    </div>
                                    <div class="single-item-caption">
                                        <a class="add-to-cart pull-left" href="{{route('getAddCart',$sale->id)}}"><i class="fa fa-shopping-cart"></i></a>
                                        <a class="beta-btn primary" href="{{route('getDetailProduct',$sale->id)}}">Chi tiết <i class="fa fa-chevron-right"></i></a>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <div class="row">{{$product_sale->appends(Request::all())->links()}}</div>
                    </div>
                </div> <!-- .beta-products-list -->
            </div>
        </div> <!-- end section with sidebar and main content -->


    </div> <!-- .main-content -->
</div> <!-- #content -->
</div>
@stop
