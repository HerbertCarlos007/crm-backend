<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateNegotiationRequest extends FormRequest
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
            'customer_id' => 'required|exists:customers,id',
            'stage_id' => 'integer',
            'company_id' => 'required|exists:companies,id',
            'closing_reason' => 'integer',
            'value' => 'string|nullable',
            'status' => 'string|nullable',
            'observation' => 'string|nullable',
            'order_number' => 'integer|nullable',
            'estimated_closing_date' => 'date|nullable',
            'created_by' => 'string',
        ];
    }
}
