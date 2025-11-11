<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TaskResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'negotiation_id' => $this->negotiation_id,
            'customer_id' => $this->customer_id,
            'company_id' => $this->company_id,
            'customer_contact' => $this->customer_contact,
            'type_task' => $this->type_task,
            'start_at' => $this->start_at,
            'end_at' => $this->end_at,
            'status' => $this->status,
            'priority' => $this->priority,
            'summary' => $this->summary,
            'detail' => $this->detail,
        ];
    }
}
