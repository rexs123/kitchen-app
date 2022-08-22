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
                'address_1' => 'required',
                'address_2' => 'nullable',
                'city' => 'required',
                'state' => 'nullable',
                'country' => 'required',
                'postal_code' => 'nullable',
                'email' => 'required|email',
                'phone_number' => 'required',
                'allergies' => 'required',
                'charge_delivery' => 'boolean',
                'notes' => 'nullable',
                'delivery_instructions' => 'nullable',
                'avatar' => 'mimes:jpg,bmp,png|nullable',
                'dob' => 'date|nullable'
            ];
        }
    }
}
