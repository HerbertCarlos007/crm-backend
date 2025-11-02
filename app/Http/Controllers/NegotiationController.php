<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateNegotiationRequest;
use App\Http\Resources\NegotiationResource;
use App\Models\Negotiation;

class NegotiationController extends Controller
{
    public function store(StoreUpdateNegotiationRequest $request)
    {
        $validated = $request->validated();
        $negotiation = Negotiation::create($validated);
        return new NegotiationResource($negotiation);
    }

    public function index($companyId)
    {
        $negotiations = Negotiation::where('company_id', $companyId)->get();
        return NegotiationResource::collection($negotiations);
    }
}
