<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ChangePassRequest extends FormRequest
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
            'currentPass' => ['required','min:8','string','max:255'],
            'password' => ['required','min:8','max:255','string',],
            'password_confirmation' => ['required','min:8','max:255','string','same:password'],
        ];
    }
    public function messages()
    {
        return [
            'max' => 'Mật khẩu phải dưới 255 kí tự!',
            'required' => 'Trường thông tin này không được bỏ trống!',
            'min' => 'mật khẩu phải trên 8 kí tự!',
            'same' => 'Mật khẩu không trùng khớp!',
        ];
    }
}
