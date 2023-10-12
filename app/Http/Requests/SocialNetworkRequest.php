<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SocialNetworkRequest extends FormRequest
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

            'facebook'  => 'required',
            'tiktok'  => 'required',
            'zalo'  => 'required',
            'youtube'  => 'required',
        ];
    }

    public function messages()
    {
        return [
            'facebook.required'  => 'Nhập link facebook',
            'tiktok.required'  => 'Nhập link tiktok',
            'zalo.required'  => 'Nhập link zalo',
            'youtube.required'  => 'Nhập link youtube',

        ];
    }
}
