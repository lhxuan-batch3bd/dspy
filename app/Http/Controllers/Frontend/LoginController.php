<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Http\Requests\RegisterRequest;
class LoginController extends Controller
{
    //
    public function getLogin()
    {
        return view('frontend.login');
    }
    public function postLogin(Request $request, LoginRequest $req)
    {
        $user = user::all();
        $remember = $request->remember_me;
        if ($request->remember_me == 'Remember Me') {
            $remember = true;
        } else {
            $remember = false;
        }

        $arr = array('email' => $request->email, 'password' => $request->password);
        if (Auth::attempt($arr, $remember)) {
            if (Auth::user()->level == 1) {
                return redirect()->route('getDashboard');
            } else {

                return redirect()->route('getPage');
            }
        } else {
            return back()->with('login_error', 'Tài khoản hoặc mật khẩu không đúng');
        }

    }
    public function getRegister()
    {
        return view('frontend.register');
    }
    public function postRegister(Request $request, RegisterRequest $req)
    {


        if($request->checkbox==1){
        $user = new User();
        $user->name = $request->name;
        $user->address = $request->address;
        $user->email = $request->email;
        $user->numberphone = $request->phone;
        $user->password = bcrypt($request->password);
        $user->save();
        return back()->with('register_success', 'Đăng ký thành công, xin mời đăng nhập');
        }else{
            return back()->with('register_fail','Vui lòng chấp thuận điều khoản');
        }
    }

}
