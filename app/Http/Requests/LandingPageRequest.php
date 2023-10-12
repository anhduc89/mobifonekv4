<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LandingPageRequest extends FormRequest
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
            'name' => 'required',
            'content'    => 'required',
            'advantage'  => 'required',
            'feature' => 'required',
            'avatar_path' => 'required'
        ];
    }
    public function messages()
    {
        return [
           'name.required'                  => 'Chưa nhập tên sản phẩm - dịch vụ',
           'content.required'               => 'Chưa nhập nội dung của sản phẩm - dịch vụ',
           'advantage.required'             => 'Chưa nhập ưu điểm của sảm phẩm - dịch vụ',
           'number_of_applicants.required'  => 'Chưa nhập tính năng của sản phẩm - dịch vụ',
           'avatar_path.required'           => 'Chưa chọn ảnh',
        ];
    }
}
