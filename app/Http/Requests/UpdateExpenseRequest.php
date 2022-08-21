<?php

namespace App\Http\Requests;
    
use Illuminate\Foundation\Http\FormRequest;

class UpdateExpenseRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'proof_of_purchase' => 'mimes:jpg,bmp,png|required',
        ];
    }
}
