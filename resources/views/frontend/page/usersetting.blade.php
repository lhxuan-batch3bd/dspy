@extends('frontend.layouts')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                <h2>Cập nhật thông tin người dùng<h2>
            </header>
            <div class="panel-body">
                <div class="position-center">
                @if(Session('setting_fail'))
                <div class="text-danger">{{Session('setting_fail')}}</div>
                @endif
                    <form role="form" method="post" action="{{route('postUserSetting',$user->id)}}">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email </label>
                            <input type="text" name="email" class="form-control" readonly id="exampleInputEmail1" value="{{$user->email}}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Họ và Tên</label>
                            <input type="text" name="name" class="form-control" id="exampleInputEmail1" value="{{$user->name}}">
                            @if($errors->has('name'))
                            <p class="text-danger">{{$errors->first('name')}}</p>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Mật khẩu cũ</label>
                            <input type="password" name="oldpassword" class="form-control" id="exampleInputEmail1" value="" placeholder="******">
                            @if($errors->has('oldpassword'))
                            <p class="text-danger">{{$errors->first('oldpassword')}}</p>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Mật khẩu mới</label>
                            <input type="password" name="newpassword" class="form-control" id="exampleInputEmail1" value="" placeholder="******">
                            @if($errors->has('newpassword'))
                            <p class="text-danger">{{$errors->first('newpassword')}}</p>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Xác nhận mật khẩu mới</label>
                            <input type="password" name="renewpassword" class="form-control" id="exampleInputEmail1" value="" placeholder="******">
                            @if($errors->has('renewpassword'))
                            <p class="text-danger">{{$errors->first('renewpassword')}}</p>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Địa chỉ</label>
                            <input type="text" name="address" class="form-control" id="exampleInputEmail1" value="{{$user->address}}">
                            @if($errors->has('address'))
                            <p class="text-danger">{{$errors->first('address')}}</p>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Số điện thoại</label>
                            <input type="text" name="phone" class="form-control" id="exampleInputEmail1" value="{{$user->numberphone}}">
                            @if($errors->has('phone'))
                            <p class="text-danger">{{$errors->first('phone')}}</p>
                            @endif
                        </div>
                        <button type="submit" class="btn btn-info">Sửa</button>
                    </form>
                </div>
            </div>
        </section>
    </div>
</div>
<style>
    .form-control {
        width: 50% !important;
    }

</style>
@endsection
