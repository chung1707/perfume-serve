<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;


class ApiLoginRequest extends FormRequest
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
            'email' => ['required','email','max:255'],
            'password' => ['required','string','max:255', 'min:6'],
        ];
    }
    public function messages()
    {
        return [
            'email.required' => 'Bạn chưa nhập email!',
            'email.email' => 'Sai định dạng email!',
            'email.max' => 'Email quá dài!',
            'password.max' => 'Mật khẩu phải dưới 255 kí tự!',
            'password.required' => 'Bạn chưa nhập mật khẩu!',
            'password.min' => 'mật khẩu phải trên 6 kí tự!',
        ];
    }
}
