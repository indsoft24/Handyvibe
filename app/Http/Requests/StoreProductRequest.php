<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'code' => 'required|string|max:50|unique:products,code',
            'name' => 'required|string|max:200',
            'quantity' => 'required|integer|min:0',
            'price' => 'required|numeric|min:0',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'is_active' => 'boolean',
        ];
    }

    public function messages(): array
    {
        return [
            'code.required' => 'Product code is required',
            'code.unique' => 'Product code already exists',
            'name.required' => 'Product name is required',
            'quantity.required' => 'Quantity is required',
            'price.required' => 'Price is required',
        ];
    }
}
