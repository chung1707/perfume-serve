<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBannerRequest extends FormRequest
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
            'title' => ['required', 'max:255', 'string', 'unique:banners'],
            'banner' => ['required',],
            'type' => ['required'],
        ];
    }
    public function messages()
    {
        return [
            'max' => 'Trường này phải dưới 255 kí tự!',
            'required' => 'Trường thông tin này không được bỏ trống!',
            'string' => 'Trường này phải là một chuỗi!',
            'unique' => 'Thông tin này đã được sử dụng!',
        ];
    }
}
