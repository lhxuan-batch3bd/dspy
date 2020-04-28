<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CommentRequest extends FormRequest
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
            'email' => 'bail|required|email|max:100',
            'name' => 'bail|required|max:100|min:3',
            'content' => 'bail|required|max:100',

        ];
    }
    public function messages()
    {
        return [
            'email.required' => 'Vui lòng nhập email',
            'email.max' => 'Email tối đa 100 ký tự',
            'email.email' => 'Vui lòng nhập đúng định dạng email',
            'name.required' => 'Vui lòng nhập tên',
            'name.min' => 'Tên ít nhất 3 ký tự',
            'name.max' => 'Tên tối đa 100 ký tự',

            'address.required' => 'Vui lòng nhập địa chỉ',
            'address.max' => 'Địa chỉ tối đa 255 ký tự',
            'content.required' => 'Vui lòng nhập bình luận của bạn',
            'content.max' => 'Bình luận tối đa 100 ký tự',
        ];
    }
}
