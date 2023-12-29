<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
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
            'name' => ['required', 'min:3'],
            'description' => ['min:10'],
            'category' => ['required'],
            'quantity' => ['required','numeric'],
            'weight' => ['required','numeric'],
            'price_before_discount' => ['required', 'numeric'],
            'availability'=>['boolean'],
            'top_product'=>['boolean'],
            'image'=>['required','image'],

        ];
    }
}
