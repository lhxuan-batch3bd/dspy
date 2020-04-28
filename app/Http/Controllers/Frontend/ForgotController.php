<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\ProfileUserRequest;
use App\Http\Requests\ResetPasswordRequest;
use App\User;
use Carbon\Carbon;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Mail;

class ForgotController extends Controller
{
    //
    public function getForgot()
    {
        return view('frontend.forgotpassword');
    }
    public function postForgot(Request $request)
    {
        $email = $request->email;

        $data = User::where('email', $email)->first();

        if ($data) {
            $code = bcrypt(md5(time() . $email));

            $data->code = $code;
            $data->timecode = Carbon::now();
            $data->save();

            $url = route('getResetPassword', ['code' => $data->code, 'email' => $email]);
            $data = [
                'route' => $url
            ];
            Mail::send('frontend.page.email_resetPassword', $data, function ($message) use ($email) {
                $message->to($email, $email);
                $message->subject('');
            });
            return back()->with('forgot_success', 'Mã lấy lại mật khẩu đã được gửi tới email của bạn');
        } else {
            return back()->with('forgot_fail', 'Không tồn tại email này, vui lòng kiểm tra');
        }
    }
    public function getResetPassword(Request $request)
    {
        $code = $request->code;
        $email = $request->email;

        $data = User::where([
            'code' => $code,
            'email' => $email
        ])->first();
        if (!$data) {
            return redirect()->route('getForgot')->with('danger', 'Xin lỗi! Đường link lấy lại mật khẩu không đúng, xin vui lòng thử lại');
        }
        return view('frontend.page.reset_password');
    }
    public function postResetPassword(ResetPasswordRequest $request)
    {
        if ($request->newpassword) {
            $code = $request->code;
            $email = $request->email;

            $data = User::where([
                'code' => $code,
                'email' => $email
            ])->first();
            if (!$data) {
                return redirect()->route('getForgot')->with('danger', 'Xin lỗi! Đường link lấy lại mật khẩu không đúng, xin vui lòng thử lại');
            }
            $data->password = bcrypt($request->newpassword);
            $data->save();

            return redirect()->route('getLogin')->with('reset_success','Mật khẩu đã được đổi thành công, mời bạn đăng nhập');
        }
    }
}
