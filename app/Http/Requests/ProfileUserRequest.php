<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfileUserRequest extends FormRequest
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

            'name' => 'bail|required|regex:/^[a-zA-Z_ÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂưăạảấầẩẫậắằẳẵặẹẻẽềềểỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ\s]+$/|min:3|max:100',
            'phone' => 'bail|required|digits:10',
            'address' => 'bail|required|max:255',
            'newpassword' => 'required|min:6|max:20',
            'oldpassword' => 'required|min:6|max:20',
            'renewpassword' => 'required|same:newpassword',
        ];
    }
    public function messages()
    {
        return [

            'name.required' => 'Vui lòng nhập tên',
            'name.regex' => 'Tên chỉ bao gồm chữ cái, khoảng trống và dấu câu',
            'name.min' => 'Tên ít nhất 3 ký tự',
            'name.max' => 'Tên tối đa 100 ký tự',

            'phone.required' => 'Vui lòng nhập số điện thoại',
            'phone.digits' => 'Số điện thoại có 10 ký tự',

            'address.required' => 'Vui lòng nhập địa chỉ',
            'address.max' => 'Địa chỉ tối đa 255 ký tự',

            'oldpassword.required' => "Vui lòng nhập mật khẩu cũ",
            'oldpassword.min' => "Mật khẩu tối thiểu 6 ký tự",
            'oldpassword.max' => "Mật khẩu tối đa 20 ký tự",
            'newpassword.required' => "Vui lòng nhập mật khẩu",
            'newpassword.min' => "Mật khẩu tối thiểu 6 ký tự",
            'newpassword.max' => "Mật khẩu tối đa 20 ký tự",

            'renewpassword.same' => 'Mật khẩu không trùng khớp',
            'renewpassword.required' => 'Vui lòng xác nhận mật khẩu',
        ];
    }
}
