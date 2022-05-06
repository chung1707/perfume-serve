<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;


class ApiRegisterRequest extends FormRequest
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
            'name' => ['required','string','max:255'],
            'email' => ['email','required','max:255', 'unique:users'],
            'password' => ['required','max:255', 'min:6', 'confirmed'],
        ];
    }
    public function messages()
    {
        return [
            'email.required' => 'Bạn chưa nhập email!',
            'email.email' => 'Sai định dạng email!',
            'email.max' => 'email quá dài!',
            'email.unique' => 'Email này đã được sử dụng!',
            'name.required' => 'Bạn chưa nhập tên!',
            'name.max' => 'Tên có độ dài tối đa 255 kí tự!',
            'name.string' => 'Tên yêu cầu là một chuối!',
            'password.max' => 'Mật khẩu phải dưới 255 kí tự!',
            'password.required' => 'Bạn chưa nhập mật khẩu!',
            'password.min' => 'mật khẩu phải trên 6 kí tự!',
            'password.confirmed' => 'Mật khẩu không trùng khớp!',
        ];
    }
}
