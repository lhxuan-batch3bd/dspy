@extends('frontend.layouts')
@section('content')
<div class="inner-header">
    <div class="container">
        <div class="pull-left">
            <h6 class="inner-title">Sản phẩm {{$detail_product->name}}</h6>
        </div>
        <div class="pull-right">
            <div class="beta-breadcrumb font-large">
                <a href="{{route('getPage')}}">Trang chủ</a> / <span>Chi tiết sản phẩm</span>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>

<div class="container">
    <div id="content">
        <div class="row">
            <div class="col-sm-9">

                <div class="row">
                    <div class="col-sm-4">
                        <img src="image/products/{{$detail_product->image}}" alt="" height="250px">
                    </div>
                    <div class="col-sm-8">
                        <div class="single-item-body">
                            <p class="single-item-title">
                                <h2>{{$detail_product->name}}</h2>
                            </p>
                            @if($detail_product->promotion_price == 0)
                            <span style="font-size:18px" class="flash-sale">{{number_format($detail_product->unit_price,0,',','.')}} VND</span>

                            @else
                            <span style="font-size:18px" class="flash-del">{{number_format($detail_product->unit_price,0,',','.')}} VND</span>
                            <span style="font-size:18px" class="flash-sale">{{number_format($detail_product->promotion_price,0,',','.')}} VND</span>
                            @endif
                            </p>
                        </div>

                        <div class="clearfix"></div>
                        <div class="space20">&nbsp;</div>

                        <div class="single-item-desc">
                            <p>{!! ($detail_product->description) !!}</p>
                        </div>
                        <div class="space20">&nbsp;</div>
                        <div class="single-item-options">
                            </select>
                            <a class="add-to-cart pull-left" href="{{route('getAddCart',$detail_product->id)}}"><i class="fa fa-shopping-cart"></i></a>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>

                <div class="space40">&nbsp;</div>

                <h3>Bình luận</h3>
                <form method="post" enctype=multipart/form-data>
                    @csrf
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" class="form-control" id="email" name="email">
                        @if ($errors->has('email'))
                        <p class="text-danger">{{ $errors->first('email') }}</p>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="name">Tên:</label>
                        <input type="text" class="form-control" id="name" name="name">
                        @if ($errors->has('name'))
                        <p class="text-danger">{{ $errors->first('name') }}</p>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="cm">Bình luận:</label>
                        <textarea style="resize: none;" rows="10" id="cm" class="form-control" name="content"></textarea>
                        @if ($errors->has('content'))
                        <p class="text-danger">{{ $errors->first('content') }}</p>
                        @endif
                    </div>
                    <div class="form-group text-right">
                        <button type="submit" class="btn btn-default">Gửi</button>
                    </div>
                </form>

                <div class="space50">&nbsp;</div>
                <div class="beta-products-list">
                    <h4>Sản phẩm tương tự</h4>

                    <div class="row">
                        @foreach($product_same as $prod_same)
                        <div class="col-sm-4">
                            <div class="single-item">
                                @if($prod_same->promotion_price != 0)
                                <div class="ribbon-wrapper">
                                    <div class="ribbon sale">Sale</div>
                                </div>
                                @endif
                                <div class="single-item-header">
                                    <a href="{{route('getDetailProduct',$prod_same->id)}}"><img src="image/products/{{$prod_same->image}}" alt="" height="250px"></a>
                                </div>
                                <div class="single-item-body">
                                    <p class="single-item-title">{{$prod_same->name}}</p>
                                    <p class="single-item-price">
                                        @if($prod_same->promotion_price == 0)
                                        <span style="font-size:15px" class="flash-sale">{{number_format($prod_same->unit_price,0,',','.')}} VND</span>
                                    </p>
                                    @else
                                    <span style="font-size:15px" class="flash-del">{{number_format($prod_same->unit_price,0,',','.')}} VND</span>
                                    <span style="font-size:15px" class="flash-sale">{{number_format($prod_same->promotion_price,0,',','.')}} VND</span>
                                    @endif
                                </div>
                                <div class="single-item-caption">
                                    <a class="add-to-cart pull-left" href="shopping_cart.html"><i class="fa fa-shopping-cart"></i></a>
                                    <a class="beta-btn primary" href="{{route('getDetailProduct',$prod_same->id)}}">Chi tiết<i class="fa fa-chevron-right"></i></a>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div> <!-- .beta-products-list -->
            </div>
            <div class="col-sm-3 aside">
                <div class="widget">
                    <h3 class="widget-title">Sản phẩm nổi bật</h3>
                    <div class="widget-body">
                        <div class="beta-sales beta-lists">
                            @foreach($product_featured as $featured)
                            <div class="media beta-sales-item">
                                <a class="pull-left" href="{{route('getDetailProduct',$featured->id)}}"><img src="image/products/{{$featured->image}}" height="58px" alt=""></a>
                                <div class="media-body">
                                    {{$featured->name}}<br>
                                    @if($featured->promotion_price == 0)
                                    <span style="font-size:11px" class="flash-sale">{{number_format($featured->unit_price,0,',','.')}} VND</span>
                                    </p>
                                    @else
                                    <span style="font-size:11px" class="flash-del">{{number_format($featured->unit_price,0,',','.')}} VND</span>
                                    <span style="font-size:11px" class="flash-sale">{{number_format($featured->promotion_price,0,',','.')}} VND</span>
                                    @endif
                                </div>
                            </div>
                            @endforeach


                        </div>
                    </div>
                </div> <!-- best sellers widget -->
                <div class="widget">
                    <h3 class="widget-title">Sản phẩm mới</h3>
                    <div class="widget-body">
                        <div class="beta-sales beta-lists">
                            @foreach($product_new as $new)
                            <div class="media beta-sales-item">
                                <a class="pull-left" href="{{route('getDetailProduct',$new->id)}}"><img src="image/products/{{$new->image}}" height="58px" alt=""></a>
                                <div class="media-body">
                                    {{$new->name}}<br>
                                    @if($new->promotion_price == 0)
                                    <span style="font-size:11px" class="flash-sale">{{number_format($new->unit_price,0,',','.')}} VND</span>
                                    </p>
                                    @else
                                    <span style="font-size:11px" class="flash-del">{{number_format($new->unit_price,0,',','.')}} VND</span>
                                    <span style="font-size:11px" class="flash-sale">{{number_format($new->promotion_price,0,',','.')}} VND</span>
                                    @endif
                                </div>
                            </div>
                            @endforeach


                        </div>
                    </div>
                </div> <!-- best sellers widget -->
            </div>
        </div>
    </div> <!-- #content -->
    <div id="comment-list">
        @foreach($comment as $cmt)
        <ul>
            <li class="com-title">
                {{$cmt->name}}
                <br>
                <span>{{date('d/m/y H:i',strtotime($cmt->created_at)) }}</span>
            </li>
            <li class="com-details">
                {{$cmt->content}}
            </li>
        </ul>
        @endforeach
    </div>
</div> <!-- .container -->
<style>
    .comment-list {
        margin-top: 25px;
        text-align: justify;
    }

    #comment-list ul {
        border-bottom: 1px dotted #cdcdcd;
        padding-bottom: 10px;
    }

    #comment-list li {
        list-style: none;
        color: #666;
        line-height: 22px;
        font-size: 12px;
    }

    li.com-title {
        color: #000;
        font-weight: bold;
        text-transform: capitalize;
    }

    li.com-title span {
        font-weight: normal;
        color: #999;
    }

</style>
@stop
