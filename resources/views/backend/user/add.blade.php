@extends('backend.master')
@section('title', 'Quản lý tài khoản')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                Thêm User
            </header>
            <div class="panel-body">
                <div class="position-center">
                    <form role="form" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email</label>
                            <input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="">
                            @if ($errors->has('email'))
                            <p class="text-danger">{{ $errors->first('email') }}</p>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail2">Tên tài khoản</label>
                            <input type="text" name="name" class="form-control" id="exampleInputEmail2" placeholder="">
                            @if ($errors->has('name'))
                            <p class="text-danger">{{ $errors->first('name') }}</p>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail3">Mật khẩu</label>
                            <input type="password" name="password" class="form-control" id="exampleInputEmail3" placeholder="">
                            @if ($errors->has('password'))
                            <p class="text-danger">{{ $errors->first('password') }}</p>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail4">Xác nhận mật khẩu</label>
                            <input type="password" name="repassword" class="form-control" id="exampleInputEmail4" placeholder="">
                            @if ($errors->has('repassword'))
                            <p class="text-danger">{{ $errors->first('repassword') }}</p>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail5">Địa chỉ</label>
                            <input type="text" name="address" class="form-control" id="exampleInputEmail5" placeholder="">
                            @if ($errors->has('address'))
                            <p class="text-danger">{{ $errors->first('address') }}</p>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail6">Số điện thoại</label>
                            <input type="text" name="phone" class="form-control" id="exampleInputEmail6" placeholder="">
                            @if ($errors->has('phone'))
                            <p class="text-danger">{{ $errors->first('phone') }}</p>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail7">Level</label>
                            <select name="level" class="form-control">
                                <option value="1" {{Auth::user()->level==1 ? "selected='selected'":'' }}>1 - Quản trị viên</option>
                                <option value="2" {{Auth::user()->level==2 ? "selected='selected'":'' }}>2 - Thành viên</option>
                            </select>
                        </div>

                        <button type="submit" class="btn btn-info">Thêm</button>
                    </form>
                </div>
            </div>
        </section>
    </div>
</div>
@endsection
