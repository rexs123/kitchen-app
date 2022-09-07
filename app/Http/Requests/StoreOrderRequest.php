<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreOrderRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'customer_id' => 'required|exists:customers,id',
            'status' => 'required',
            'products' => 'required|array',
            'completed_at' => 'nullable|date',
            'delivered_at' => 'nullable|date'
        ];
    }
}
