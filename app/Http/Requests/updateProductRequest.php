<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class updateProductRequest extends FormRequest
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
            'category_id' => ['required', 'max:255','numeric'],
            'price' => 'required|max:255',
            'capacity' => ['required', 'regex:/[0-9]/','numeric'],
            'description' => ['required'],
            'quantity' => ['required', 'regex:/[0-9]/','numeric'],
            'saveIncense' => ['required', 'regex:/[0-9]/','numeric'],
            'concentration' => ['required'],
            'age' => ['required','numeric'],
            'release' => ['required',],
            'summer' => ['required', 'regex:/[0-9]/','numeric'],
            'winter' => ['required', 'regex:/[0-9]/','numeric'],
            'fall' => ['required', 'regex:/[0-9]/','numeric'],
            'spring' => ['required', 'regex:/[0-9]/','numeric'],
            'daytime' => ['required', 'regex:/[0-9]/','numeric'],
            'night' => ['required', 'regex:/[0-9]/','numeric'],
        ];
    }
    public function messages()
    {
        return [/*  */
            'required' => 'Trường này không được bỏ trống!',
            'max' => 'Thông tin quá dài!',
            'phone.min' => 'Thông tin quá ngắn!',
            'regex' => 'Thông tin sai định dạng số',
        ];
    }
}
