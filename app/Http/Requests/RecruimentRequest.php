<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RecruimentRequest extends FormRequest
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
            'title' => 'required',
            'image_path'    => 'required',
            'contents'  => 'required',
            'number_of_applicants' => 'required|numeric',
            'application_deadline' => 'required'
        ];
    }
    public function messages()
    {
        return [
           'title.required' => 'Chưa nhập tiêu đề bài viết',
           'image_path.required'    => 'Chưa chọn ảnh đại diện cho bài viết',
           'contents.required'  => 'Chưa nhập nội dung bài tin tuyển dụng',
           'number_of_applicants.required'  => 'Chưa nhập tiêu chí số lượng tuyển dụng',
           'number_of_applicants.numeric'  => 'Nhập kí tự là số',
           'application_deadline.required'  => 'Chưa chọn ngày hết hạn nộp hồ sơ ứng tuyển',
        ];
    }
}
