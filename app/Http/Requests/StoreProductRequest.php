<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'string|required',
            'image' => 'mimes:jpg,bmp,png|nullable',
            'description' => 'required',
            'ingredients' => 'nullable|array',
            'allergens' => 'nullable|array',
            'price' => 'numeric|required',
            'weight' => 'numeric|required',
            'cost_of_materials' => 'numeric|nullable',
            'cost_of_ingredients' => 'numeric|nullable',
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'ingredients' => $this->ingredients? explode(',', $this->ingredients) : NULL,
            'allergens' => $this->allergens? explode(',', $this->allergens) : NULL
        ]);
    }
}
