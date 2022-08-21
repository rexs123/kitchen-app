<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreExpenseRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'fixed' => 'boolean|required',
            'amount' => 'number|required',
            'proof_of_purchase' => 'mimes:jpg,bmp,png|nullable',
            'taxes' => 'number|required',
        ];
    }
}
