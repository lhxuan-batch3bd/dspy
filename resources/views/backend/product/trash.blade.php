@extends('backend.master')
@section('title', 'Sản phẩm')
@section('content')
<div class="table-agile-info">
    <div class="panel panel-default">
        <div class="panel-heading">
            Sản phẩm
        </div>
        <div style="text-align:center;" class="table-responsive">
            <table class="table table-striped b-t b-light table-bordered table-hover">
                <thead>
                    <tr>
                        <th>Tên sản phẩm</th>
                        <th>Hình ảnh</th>
                        <th>Hành động</th>
                    </tr>
                </thead>
                @foreach($product as $pd)
                <tbody>
                    <tr>
                        <td>{{$pd->name}}</td>

                        <td><img src="uploads/products/{{$pd->image}}" height="100" width="100"></td>

                        <td>
                            <a href="{{route('restoreProd',$pd->id)}}" ui-toggle-class=""><i class="fa fa-refresh text-success text-active">Restore Deleted</i>
                        </td>

                    </tr>
                </tbody>

                @endforeach

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

</style>
@stop
