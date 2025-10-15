<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateUserRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use function Symfony\Component\String\u;

class UserController extends Controller
{
    public function store(StoreUpdateUserRequest $request)
    {
        $avatarPath = null;
        $avatarUrl = null;

        if ($request->hasFile('avatar_url')) {
            $avatarPath = $request->file('avatar_url')->store('avatars', 's3');
            Storage::disk('s3')->setVisibility($avatarPath, 'public');
            $avatarUrl = Storage::disk('s3')->url($avatarPath);
        }

        $validated = $request->validated();
        $validated['avatar_url'] = $avatarUrl;

        $user = User::create($validated);

        $token = $user->createToken('api_token')->plainTextToken;

        return response()->json([
            'user' => new UserResource($user),
            'access_token' => $token,
            'token_type' => 'Bearer'
        ], 201);
    }

    public function index($companyId)
    {
        $users = User::where('company_id', $companyId)->get();
        return UserResource::collection($users);
    }



}
