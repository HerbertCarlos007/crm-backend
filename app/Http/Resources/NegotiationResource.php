<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class NegotiationResource extends JsonResource
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
            'customer_id' => $this->customer_id,
            'stage_id' => $this->stage_id,
            'company_id' => $this->company_id,
            'closing_reason' => $this->closing_reason,
            'value' => $this->value,
            'status' => $this->status,
            'observation' => $this->observation,
            'order_number' => $this->order_number,
            'estimated_closing_date' => $this->estimated_closing_date,
            'created_by' => $this->created_by,
            'created_at' => $this->created_at,
        ];
    }
}
