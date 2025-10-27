<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreUpdateCustomerRequest extends FormRequest
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
            'customer_type' => ['required', 'string', Rule::in(['pf', 'pj'])],
            'document_number' => 'required|string',
            'name' => 'string|max:255',
            'postal_code' => 'string|max:15',
            'address' => 'string|max:255',
            'number' => 'integer',
            'district' => 'string|max:100',
            'address_complement' => 'nullable|string|max:100',
            'city' => 'string|max:100',
            'state' => 'string|max:2',
            'country' => 'string|max:100',
            'phone_number' => 'string|max:20',
            'email' => 'email|max:255|unique:customers,email',
            'company_id' => 'required|exists:companies,id',
            'created_by' => 'string|max:100',
        ];
    }
}
