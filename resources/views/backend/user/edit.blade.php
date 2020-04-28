@extends('backend.master')
@section('title', 'Quản lý tài khoản')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                Cập nhật tài khoản
            </header>
            <div class="panel-body">
                <div class="position-center">
                    <form role="form" method="post" action="{{route('postEditUser',$user->id)}}">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên User</label>
                            <input type="text" name="name" class="form-control" id="exampleInputEmail1" value="{{$user->name}}">
                            @if ($errors->has('name'))
                            <p class="text-danger">{{ $errors->first('name') }}</p>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email</label>
                            <input type="email" name="email" class="form-control" id="exampleInputEmail1" value="{{$user->email}}">
                            @if ($errors->has('email'))
                            <p class="text-danger">{{ $errors->first('email') }}</p>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Mật khẩu</label>
                            <input type="password" name="password" class="form-control" id="exampleInputEmail1" value="******">
                            @if ($errors->has('password'))
                            <p class="text-danger">{{ $errors->first('password') }}</p>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Xác nhận mật khẩu</label>
                            <input type="password" name="repassword" class="form-control" id="exampleInputEmail1" value="******">
                            @if ($errors->has('repassword'))
                            <p class="text-danger">{{ $errors->first('repassword') }}</p>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Địa chỉ</label>
                            <input type="text" name="address" class="form-control" id="exampleInputEmail1" value="{{$user->address}}">
                            @if ($errors->has('address'))
                            <p class="text-danger">{{ $errors->first('address') }}</p>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Số điện thoại</label>
                            <input type="text" name="phone" class="form-control" id="exampleInputEmail1" value="{{$user->numberphone}}">
                            @if ($errors->has('phone'))
                            <p class="text-danger">{{ $errors->first('phone') }}</p>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Level</label>
                            <select name="level" class="form-control">
                                <option value="1" {{$user->level==1 ? "selected='selected'":'' }}>1 - Quản trị viên</option>
                                <option value="2" {{$user->level==2 ? "selected='selected'":'' }}>2 - Thành viên</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-info">Sửa</button>
                    </form>
                </div>
            </div>
        </section>
    </div>
</div>
@endsection
