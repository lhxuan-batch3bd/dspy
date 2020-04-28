<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'unit_price' => 'bail|required|numeric',
            'promotion_price' => 'bail|nullable|numeric',
            'status' => 'required|regex:/^[0-1]$/',
            'unit' => 'required|max:100',
            'featured' => 'required|regex:/^[0-1]$/',
            'name' => 'bail|required|regex:/^[a-zA-Z_ÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂưăạảấầẩẫậắằẳẵặẹẻẽềềểỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ\s]+$/|max:100',


        ];
    }
    public function messages()
    {
        return [
            'unit_price.required' => 'Vui lòng nhập giá',
            'unit_price.numeric' => 'Giá tiền chỉ được nhập số',
            'promotion_price.numeric' => 'Giá tiền chỉ được nhập số',
            'status.required' => 'Vui lòng nhập status',
            'status.regex' => 'Chỉ nhập 0 hoặc 1',
            'unit.required' => 'Vui lòng nhập bao bì',
            'unit.max' => 'Bao bì tối đa 100 ký tự',

            'featured.required' => 'Vui lòng nhập nổi bật',
            'featured.regex' => 'Chỉ nhập 0 hoặc 1',

            'name.required' => 'Vui lòng nhập tên sản phẩm',
            'name.regex' => 'Tên chỉ bao gồm chữ cái, khoảng trống và dấu câu',
            'name.max' => 'Tên tối đa 100 ký tự',


        ];
    }
}
