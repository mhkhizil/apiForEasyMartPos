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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            "name" => "required|min:3",
            "brand_id" => "required|numeric|exists:brands,id",
            "actual_price" => "required|numeric|min:100",
            "sale_price" => "required|numeric|min:100",
            // "total_stock" => "required",
            "unit" => "required",
            "more_information" => "min:10",
            "photo" => "required"
        ];
    }
}
