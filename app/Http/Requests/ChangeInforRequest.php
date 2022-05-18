<?php

namespace App\Http\Requests;

use App\Rules\ValidEmailRule;
use App\Rules\ValidPhoneRule;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class ChangeInforRequest extends FormRequest
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
            'name' => 'required|max:255|string',
            'email' => ['required','email','max:255', new ValidEmailRule()],
            'address' => 'required|max:255',
            'phone' => ['required', 'max:15', 'min:9', 'regex:/[0-9]/',new ValidPhoneRule()],
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
            'phone.max' => 'Số điện thoại phải dưới 15 kí tự!',
            'phone.required' => 'Bạn chưa nhập Số điện thoại!',
            'phone.min' => 'Số điện thoại phải trên 9 kí tự!',
            'phone.unique' => 'Số điện tho này đã được sử dụng!',
        ];
    }
}
