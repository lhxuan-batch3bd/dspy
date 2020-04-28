@extends('backend.master')
@section('title', 'Quản lý tài khoản')
@section('content')
<ul class="nav pull-right top-menu">
    <li>
        <form role="search" method="get" id="searchform" action="{{route('getSearchUser')}}">
            <input name="key" type="text" class="form-control search" placeholder=" Search">
        </form>
    </li>
</ul>
<div class="table-agile-info">
    {{ $users->links() }}
    <div class="panel panel-default">
        @if(Session()->has('add_success'))
        <div class="alert alert-success">{{Session('add_success')}}</div>
        @endif
        @if(Session('update_success'))
        <div class="alert alert-success">{{Session('update_success')}}</div>
        @endif
        @if(Session('restore_success'))
        <div class="alert alert-success">{{Session('restore_success')}}</div>
        @endif
        @if(Session('delete_fail'))
        <div class="alert alert-danger">{{Session('delete_fail')}}</div>
        @endif
        @if(Session('delete_success'))
        <div class="alert alert-success">{{Session('delete_success')}}</div>
        @endif
        <div class="panel-heading">
            Quản lý tài khoản
        </div>

        <div style="text-align:left;" class="table-responsive">
            <table class="table table-striped b-t b-light table-bordered table-hover">
                <thead>
                    <tr>
                        <th>Tên tài khoản</th>
                        <th>Email</th>
                        <th>Mật khẩu</th>
                        <th>Địa chỉ</th>
                        <th>Số điện thoại</th>
                        <th>Level</th>
                        <th colspan="2">Hành động</th>
                    </tr>
                </thead>
                @foreach($users as $user)
                <tbody>
                    <tr>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>
                            <p id="p1">{{$user->password}}</p>
                        </td>
                        <td>{{$user->address}}</td>
                        <td>{{$user->numberphone}}</td>

                        <td>
                            @if($user->level == 1)
                            1- Quản trị viên
                            @else
                            2- Thành viên
                            @endif
                        </td>
                        <td>
                            <a href="{{route('getEditUser',$user->id)}}" ui-toggle-class=""><i class="fa fa-edit text-success text-active">Sửa</i></a>
                        </td>
                        <td>
                            <a href="{{route('getDeleteUser',$user->id)}}" onclick="return confirm('Bạn có chắc muốn xóa danh mục?')"><i class="fa fa-times text-danger text">Xóa</i></a>
                        </td>
                    </tr>
                </tbody>
                @endforeach

            </table>

        </div>

    </div>
    {{ $users->links() }}
</div>

<style>
    #p1 {
        margin-left: 30px;
        width: 40px;
        overflow: hidden;
        white-space: nowrap;
        text-overflow: ellipsis;
    }

    th {
        text-align: center;
    }

</style>
@stop
