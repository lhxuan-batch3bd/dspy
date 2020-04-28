<!--A Design by W3layouts
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<head>
    <base href="{{asset('backend')}}/">
    <title>Visitors an Admin Panel Category Bootstrap Responsive Website Template | Login :: PYU</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="Visitors Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template,
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
    <script type="application/x-javascript">
        addEventListener("load", function() {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }

    </script>
    <!-- bootstrap-css -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- //bootstrap-css -->
    <!-- Custom CSS -->
    <link href="css/style.css" rel='stylesheet' type='text/css' />
    <link href="css/style-responsive.css" rel="stylesheet" />
    <!-- font CSS -->
    <link href='//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
    <!-- font-awesome icons -->
    <link rel="stylesheet" href="css/font.css" type="text/css" />
    <link href="css/font-awesome.css" rel="stylesheet">
    <!-- //font-awesome icons -->
    <script src="js/jquery2.0.3.min.js"></script>
</head>
<body>
    <div class="log-w3">
        <div class="w3layouts-main">
            @if(session()->has('login_error'))
            <div class="alert alert-danger">
                {{ session()->get('login_error') }}
            </div>
            @endif
            @if(session()->has('logout_success'))
            <div class="alert alert-success">
                {{ session()->get('logout_success') }}
            </div>
            @endif
            @if(session()->has('acess_login'))
            <div class="alert alert-danger">
                {{ session()->get('acess_login') }}
            </div>
            @endif
            @if(session()->has('login_cart'))
            <div class="alert alert-danger">
                {{ session()->get('login_cart') }}
            </div>
            @endif
            @if(session()->has('reset_success'))
            <p class="text-success">{{session('reset_success')}}</p>
            @endif
            <h2>Đăng nhập</h2>

            <form method="post" role="form" enctype=multipart/form-data>
                @csrf
                <input type="email" class="ggg" name="email" placeholder="E-MAIL">
                @if($errors->has('email'))
                <p class="text-danger">{{$errors->first('email')}}</p>
                @endif
                <input type="password" class="ggg" name="password" placeholder="PASSWORD">
                @if($errors->has('password'))
                <p class="text-danger">{{$errors->first('password')}}</p>
                @endif

                <span><input name="remember_me" value="Remember Me" type="checkbox" />Nhớ mật khẩu</span>
                <h6><a href="{{route('getForgot')}}">Quên mật khẩu?</a></h6>
                <div class="clearfix"></div>
                <input type="submit" value="Đăng nhập">
            </form>
            <p>Chưa có tài khoản ?<a href="{{route('getRegister')}}">Tạo tài khoản</a></p>
        </div>
    </div>
    <script src="js/bootstrap.js"></script>
    <script src="js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="js/scripts.js"></script>
    <script src="js/jquery.slimscroll.js"></script>
    <script src="js/jquery.nicescroll.js"></script>
    <!--[if lte IE 8]><script language="javascript" type="text/javascript" src="js/flot-chart/excanvas.min.js"></script><![endif]-->
    <script src="js/jquery.scrollTo.js"></script>
</body>
</html>
