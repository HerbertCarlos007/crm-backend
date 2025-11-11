<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateTaskRequest extends FormRequest
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
            'negotiation_id' => 'required|integer',
            'customer_id' => 'required|integer',
            'company_id' => 'required|integer',
            'customer_contact' => 'string|nullable',
            'type_task' => 'string|nullable',
            'start_at' => 'date',
            'end_at' => 'date|after:start_at',
            'status' => 'string|nullable',
            'priority' => 'string|nullable',
            'summary' => 'string|nullable',
            'detail' => 'string|nullable',
        ];
    }
}
