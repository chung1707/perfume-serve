<?php

namespace App\Http\Requests\Statistic;

use Illuminate\Foundation\Http\FormRequest;

class CheckTurnOverRequest extends FormRequest
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
            'start' =>'required',
            'end' =>'required',
        ];
    }
    public function messages()
    {
        return [
            'start.required' => 'Bạn chưa nhập ngày bắt đầu!',
            'end.required' => 'Bạn chưa nhập ngày kết thúc!',
        ];
    }
}
