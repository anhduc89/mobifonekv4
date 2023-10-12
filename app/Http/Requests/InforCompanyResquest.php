<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InforCompanyResquest extends FormRequest
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
            'address' => 'required',
            'email' => 'required|email',
            'phone' => 'required|numeric',
            'map' => 'required',
            'image_logo_path' => 'required',
            'image_favicon_path' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'address.required' => 'Địa chỉ không được để trống. Nhập đi con vợ',
            'email.required'    => 'Email cũng không được để trống',
            'email.email'   => 'Email chưa đúng định dạng con vợ ạ',
            'map.required'  => 'Điền thông tin bản đồ vào',
            'phone.required'    => 'Chưa điền số điện thoại kìa',
            'phone.numeric' => 'Điền số, không phải chữ',
            'image_logo.required' => 'Không chọn logo à???',
            'favicon.required'  => 'Chọn ảnh favicon',

            'facebook.required'  => 'Nhập link facebook',
            'tiktok.required'  => 'Nhập link tiktok',
            'zalo.required'  => 'Nhập link zalo',
            'youtube.required'  => 'Nhập link youtube',

        ];
    }
}
