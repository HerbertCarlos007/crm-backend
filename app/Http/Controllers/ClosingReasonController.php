<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateClosingReason;
use App\Http\Resources\ClosingReasonResource;
use App\Models\ClosingReason;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class ClosingReasonController extends Controller
{
    public function store(StoreUpdateClosingReason $request): ClosingReasonResource
    {
        $validated = $request->validated();
        $closingReason = ClosingReason::create($validated);
        return new ClosingReasonResource($closingReason);
    }

    public function index($companyId): AnonymousResourceCollection
    {
        $closingReasons = ClosingReason::where('company_id', $companyId)->get();
        return ClosingReasonResource::collection($closingReasons);
    }
}
