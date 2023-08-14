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
            //product store and update validation rules
            'title' => ['required', 'string', 'max:25'],
            'category' => 'required',
            'description' => ['required', 'string', 'max:255'],
            'ingredients' => ['required', 'string', 'max:255'],
            'price' => ['required', 'numeric', 'max:1000'],
            'image' => 'sometimes|mimes:jpg,png,jpeg|max:5048',
        ];
    }
}
