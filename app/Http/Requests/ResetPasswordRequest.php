<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ResetPasswordRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'newpassword' => 'required|min:6|max:20',
            'renewpassword' => 'required|same:newpassword',
        ];
    }
    public function messages()
    {
        return [
            'newpassword.required' => "Vui lòng nhập mật khẩu",
            'newpassword.min' => "Mật khẩu tối thiểu 6 ký tự",
            'newpassword.max' => "Mật khẩu tối đa 20 ký tự",

            'renewpassword.same' => 'Mật khẩu không trùng khớp',
            'renewpassword.required' => 'Vui lòng xác nhận mật khẩu',
        ];
    }
}
