@extends('backend.master')
@section('title', 'Quản lý tài khoản')
@section('content')
<div class="table-agile-info">
    <div class="panel panel-default">
        @if(Session('restore_success'))
        <div class="alert alert-success">{{Session('restore_success')}}</div>
        @endif
        <div class="panel-heading">
            User bị xóa
        </div>
        <div style="text-align:left;" class="table-responsive">
            <table class="table table-striped b-t b-light table-bordered table-hover">
                <thead>
                    <tr>
                        <th>Tên User</th>
                        <th>Email</th>
                        <th>Level</th>
                        <th>Hành động</th>
                    </tr>
                </thead>
                @foreach($user as $trash)
                <tbody>
                    <tr>
                        <td>{{$trash->name}}</td>
                        <td>{{$trash->email}}</td>
                        <td>{{$trash->level}}</td>

                        <td>
                            <a href="{{route('restoreUser',$trash->id)}}" ui-toggle-class=""><i class="fa fa-refresh text-success text-active">Restore Deleted</i>
                        </td>
                    </tr>
                </tbody>

                @endforeach

            </table>

        </div>

    </div>

</div>

<style>


    th {
        text-align: center;
    }

</style>
@stop
