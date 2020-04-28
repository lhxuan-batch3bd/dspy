<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            //
            'email' => 'bail|required|email|unique:vp_users|max:100',
            'name' => 'bail|required|regex:/^[a-zA-Z_ÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂưăạảấầẩẫậắằẳẵặẹẻẽềềểỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ\s]+$/|min:3|max:100',
            'phone' => 'bail|required|digits:10',
            'address' => 'bail|required|max:255',
            'password' => 'required|min:6|max:20',
            'repassword' => 'required|same:password',
        ];
    }
    public function messages()
    {
        return [
            'email.required' => 'Vui lòng nhập email',
            'email.max' => 'Email tối đa 100 ký tự',
            'email.email' => 'Vui lòng nhập đúng định dạng email',
            'email.unique'=> 'Email đã có người sử dụng',
            'name.required' => 'Vui lòng nhập tên',
            'name.regex' => 'Tên chỉ bao gồm chữ cái, khoảng trống và dấu câu',
            'name.min' => 'Tên ít nhất 3 ký tự',
            'name.max' => 'Tên tối đa 100 ký tự',

            'phone.required' => 'Vui lòng nhập số điện thoại',
            'phone.digits' => 'Số điện thoại có 10 ký tự',

            'address.required' => 'Vui lòng nhập địa chỉ',
            'address.max' => 'Địa chỉ tối đa 255 ký tự',

            'password.required' => "Vui lòng nhập mật khẩu",
            'password.min' => "Mật khẩu tối thiểu 6 ký tự",
            'password.max' => "Mật khẩu tối đa 20 ký tự",

            'repassword.same' => 'Mật khẩu không trùng khớp',
            'repassword.required' => 'Vui lòng xác nhận mật khẩu',
        ];
    }
}
