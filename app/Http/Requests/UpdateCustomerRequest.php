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
                'address.address_1' => 'required',
                'address.address_2' => 'nullable',
                'address.city' => 'required',
                'address.state' => 'nullable',
                'address.country' => 'required',
                'address.postal_code' => 'nullable',
                'email' => 'required|email',
                'phone_number' => 'required',
                'allergies' => 'required',
                'charge_delivery' => 'boolean',
                'avatar' => 'mimes:jpg,bmp,png|nullable',
                'dob' => 'date|nullable'
            ];
        }
    }
}
