<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|string|max:100',
            'price' => 'required|numeric|min:8',
            'available_quantity' => 'required|integer|min:1',
            'listing_type_id' => 'required',
            'description' => 'required|string',
            'pictures' => 'array',
            'pictures.*' => 'url'
        ];
    }
}
