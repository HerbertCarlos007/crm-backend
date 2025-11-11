<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateTaskRequest;
use App\Http\Resources\TaskResource;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class TaskController extends Controller
{
    public function store(StoreUpdateTaskRequest $request): TaskResource
    {
        $validated = $request->validated();
        $task = Task::create($validated);
        return new TaskResource($task);
    }

    public function index($companyId): AnonymousResourceCollection
    {
        $tasks = Task::where('company_id', $companyId)->get();
        return TaskResource::collection($tasks);
    }
}
