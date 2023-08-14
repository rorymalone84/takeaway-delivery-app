<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
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
            'customer_name' => ['required', 'string', 'max:255'],
            'customer_address' => ['required', 'string', 'max:255'],
            'customer_email' => 'required|email',
            'customer_city' => ['required', 'string', 'max:255'],
            'customer_phone' => 'required', 'numeric|max:10',
            'delivery_price' => 'required', 'numeric',
            'store_id' => 'required',
            'user_id' => 'sometimes'
        ];
    }
}