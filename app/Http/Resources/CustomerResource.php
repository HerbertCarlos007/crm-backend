<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CustomerResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'customer_type' => $this->customer_type,
            'document_number' => $this->document_number,
            'name' => $this->name,
            'postal_code' => $this->postal_code,
            'address' => $this->address,
            'number' => $this->number,
            'district' => $this->district,
            'address_complement' => $this->address_complement,
            'city' => $this->city,
            'state' => $this->state,
            'country' => $this->country,
            'phone_number' => $this->phone_number,
            'email' => $this->email,
            'company_id' => $this->company_id,
            'created_by' => $this->created_by,
        ];
    }
}
