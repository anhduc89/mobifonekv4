<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewsRequest extends FormRequest
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
            'title'     => 'required|unique:news|max:255',
            'contents'  => 'required',
        ];
    }

    public function messages(): array
{
    return [
        'title.required'    => 'Tiêu đề chưa nhập',
        'title.unique'      => 'Tiêu đề đã tồn tại',
        'contents.required' => 'Chưa nhập nội dung bài viết',
    ];
}
}
