<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductsRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name'  => 'required',
            'contents'  => 'required',
            'image_path'    => 'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Chưa nhập tên sản phẩm - dịch vụ',
            'contents.required' => 'Chưa nhập nội dung sản phẩm - dịch vụ',
            'image_path.required' => 'Chưa chọn ảnh',
        ];
    }
}
