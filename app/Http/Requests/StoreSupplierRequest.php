<?php

namespace App\Http\Requests;

use App\Rules\ValidEmailRule;
use App\Rules\ValidPhoneRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreSupplierRequest extends FormRequest
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
            'email' => ['required','email','max:255', 'unique:suppliers'],
            'phone' => ['required', 'max:15', 'min:9', 'regex:/[0-9]/','unique:suppliers'],
            'address' => 'required|max:255|string',
        ];
    }
    public function messages()
    {
        return [
            'max' => 'Trường này phải dưới 255 kí tự!',
            'required' => 'Trường thông tin này không được bỏ trống!',
            'string' => 'Trường này phải là một chuỗi!',
            'numeric' => 'Trường này phải la 1 dãy số!',
            'email' => 'Trường này sai định dạng email!',
            'min' => 'Trường này yêu cầu tối thiểu 9 kí tự!',
            'regex' => 'Sai định dạng số!',
            'unique' => 'Thông tin này đã được sử dụng!',
        ];
    }
}
