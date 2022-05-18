<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreOrderRequest extends FormRequest
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
            'note'=> 'nullable',
            'products' => 'required',
            'deliveryAddress' => 'required|max:255',
            'payment_methods' => 'required',
            'totalPrice' => 'required',
            'discount_id'=> 'nullable',
            'email' => ['required', 'max:255', 'email'],
            'phone_number' => ['required', 'max:13', 'min:9', 'regex:/[0-9]/'],
        ];
    }
}
