<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateCompanyRequest extends FormRequest
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
            'name' => ['string'],
            'company_name' => ['string'],
            'document_number' => ['string'],
            'postal_code' => ['string'],
            'address' => ['string'],
            'number' => ['integer'],
            'district' => ['string'],
            'address_complement' => ['string'],
            'city' => ['string'],
            'state' => ['string'],
            'country' => ['string'],
            'phone_number' => ['string'],
            'company_email' => ['string'],
            'logo_url' => ['nullable', 'image', 'max:2048']
        ];
    }
}
