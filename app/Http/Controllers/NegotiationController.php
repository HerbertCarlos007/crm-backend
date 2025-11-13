<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateNegotiationRequest;
use App\Http\Resources\NegotiationResource;
use App\Models\Negotiation;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class NegotiationController extends Controller
{
    public function store(StoreUpdateNegotiationRequest $request): NegotiationResource
    {
        $lastOrderNumber = Negotiation::max('order_number');
        $newOrderNumber = $lastOrderNumber ? $lastOrderNumber + 1 : 1000;

        $validated = $request->validated();
        $validated['order_number'] = $newOrderNumber;

        $negotiation = Negotiation::create($validated);
        return new NegotiationResource($negotiation);
    }

    public function index($companyId): AnonymousResourceCollection
    {
        $negotiations = Negotiation::with('stage:id,name', 'customer:id,name')
        ->where('company_id', $companyId)
        ->get();
        return NegotiationResource::collection($negotiations);
    }
}
