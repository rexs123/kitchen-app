<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCustomerRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'first_name' => 'required',
            'last_name' => 'required',
            'address_1' => 'required',
            'address_2' => 'nullable',
            'city' => 'required',
            'state' => 'nullable',
            'country' => 'required',
            'postal_code' => 'nullable',
            'email' => 'required|email',
            'phone_number' => 'required',
            'allergies' => 'required',
            'notes' => 'nullable',
            'delivery_instructions' => 'nullable',
            'charge_delivery' => 'boolean',
            'avatar' => 'mimes:jpg,bmp,png|nullable',
            'dob' => 'date|nullable'
        ];
    }

    public function messages()
    {
        return [
            'first_name.required' => 'A first name is required.',
            'last_name.required' => 'A last name is required.',
            'address.address_1.required' => 'Address line 1 is required.',
            'address.city.required' => 'A city is required.',
            'address.country.required' => 'A country is required.',
            'email.required' => 'An email address is required.',
            'phone_number.required' => 'A phone number is required.',
        ];
    }
}
