<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use JustSteveKing\LaravelPostcodes\Rules\Postcode;
use JustSteveKing\LaravelPostcodes\Service\PostcodeService;

class CreateStoreRequest extends FormRequest
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
            'name' => 'required|string|min:3|max:255',
            'address_line_1' => 'required|string|min:3|max:100',
            'address_line_2' => 'required|string|min:3|max:100',
            'city' => 'required|string|min:3|max:100',
            'postcode' => ['required', new Postcode(resolve(PostcodeService::class))],
            'phone' => 'required', 'numeric|max:10',
            'delivery_price' => 'required|numeric|min:6|max:12',
        ];
    }
}
