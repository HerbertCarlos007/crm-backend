<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateStageRequest;
use App\Http\Resources\StageResource;
use App\Models\Stage;

class StageController extends Controller
{
    public function store(StoreUpdateStageRequest $request)
    {
       $validated = $request->validated();
       $stage = Stage::create($validated);
        return new StageResource($stage);
    }

    public function index($companyId)
    {
        $stages = Stage::where('company_id', $companyId)->get();
        return StageResource::collection($stages);
    }
}
