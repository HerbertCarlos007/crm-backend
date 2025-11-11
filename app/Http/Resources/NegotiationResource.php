<?php

namespace App\Http\Resources;

use Carbon\Carbon;
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
            'customer_name' => $this->whenLoaded('customer', function () {
                return $this->customer->name;
            }),
            'stage_id' => $this->stage_id,
            'stage_name' => $this->whenLoaded('stage', function () {
                return $this->stage?->name;
            }),
            'company_id' => $this->company_id,
            'closing_reason' => $this->closing_reason,
            'value' => $this->value,
            'status' => $this->status,
            'observation' => $this->observation,
            'order_number' => $this->order_number,
            'estimated_closing_date' => Carbon::parse($this->estimated_closing_date)->format('d/m/Y'),
            'created_by' => $this->created_by,
            'created_at' => Carbon::parse($this->created_at)->format('d/m/Y'),
        ];
    }
}
