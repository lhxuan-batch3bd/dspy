@extends('backend.master')
@section('title', 'Chi tiết hóa đơn')
@section('content')
<button onclick="prinpdf()"><i class="fa fa-print"></i>Print</button>
<div class="table-agile-info">
    <div class="panel panel-default">
        <div class="panel-heading">
            Chi tiết hóa đơn
        </div>
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
                        <th>Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($bill_detail as $bd)
                    <tr>
                        <td>#{{$bd->id_bill ?? 'no bill'}}</td>
                        <td>{{$bd->bill->customer->name ?? 'no bill'}}</td>
                        <td>{{$bd->product->name ??'no product'}}</td>
                        <td><img src="uploads/products/{{$bd->product->image}}" height="100" width="100"></td>
                        <td>{{$bd->quantity}}</td>
                        <td>{{$bd->bill->dateorder ?? 'no day'}}</td>
                        <td>{{$bd->bill->payment ?? 'no day'}}</td>
                        <td>{{number_format($bd->price,0,',','.')}} VND</td>

                        <td>
                            <a href="{{route('getDisplayBill')}}">Quay lại hóa đơn</a>
                        </td>
                    </tr>
                    @endforeach
                    <tr>
                        <th colspan="3">Tổng tiền</th>
                        <td>{{$bd->bill->total ??'no total'}}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
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


@media print {
    .footer,.header,
    #non-printable {
        display: none !important;
    }
    #printable {
        display: block;
    }
}
</style>

<script>
    function prinpdf() {
        window.print();
    }

</script>
@stop
