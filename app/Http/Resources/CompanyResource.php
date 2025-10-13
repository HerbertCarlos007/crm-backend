<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CompanyResource extends JsonResource
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
            'name' => $this->name,
            'company_name' => $this->company_name,
            'document_number' => $this->document_number,
            'postal_code' => $this->postal_code,
            'address' => $this->address,
            'number' => $this->number,
            'district' => $this->district,
            'address_complement' => $this->address_complement,
            'city' => $this->city,
            'state' => $this->state,
            'country' => $this->country,
            'phone_number' => $this->phone_number,
            'company_email' => $this->company_email,
            'logo_url' => $this->logo_url,
        ];
    }
}
