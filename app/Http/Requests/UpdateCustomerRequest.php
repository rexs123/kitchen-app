<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCustomerRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        {
            return [
                'address' => 'json|required',
                'email' => 'required|email',
                'phone_number' => 'required',
                'allergies' => 'json|nullable',
                'charge_delivery' => 'boolean',
                'avatar' => 'mimes:jpg,bmp,png|nullable',
                'dob' => 'date|nullable'
            ];
        }
    }
}
