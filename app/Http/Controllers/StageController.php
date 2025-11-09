<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateStageRequest;
use App\Http\Resources\StageResource;
use App\Models\Stage;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class StageController extends Controller
{
    public function store(StoreUpdateStageRequest $request): StageResource
    {
        $validated = $request->validated();
        $stage = Stage::create($validated);
        return new StageResource($stage);
    }

    public function index($companyId): AnonymousResourceCollection
    {
        $stages = Stage::where('company_id', $companyId)->get();
        return StageResource::collection($stages);
    }
}
