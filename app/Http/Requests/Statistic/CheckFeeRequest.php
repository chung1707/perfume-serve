<?php

namespace App\Http\Requests\Statistic;

use Illuminate\Foundation\Http\FormRequest;

class CheckFeeRequest extends FormRequest
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
            'Start' =>'required',
            'End' =>'required',
        ];
    }
    public function messages()
    {
        return [
            'Start.required' => 'Bạn chưa nhập ngày bắt đầu!',
            'End.required' => 'Bạn chưa nhập ngày kết thúc!',
        ];
    }
}
