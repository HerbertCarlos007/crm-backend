<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateLoginRequest;
use App\Http\Requests\StoreUpdateUserRequest;
use App\Http\Resources\UserResource;
use App\Models\Company;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use function Symfony\Component\String\u;

class UserController extends Controller
{
    public function store(StoreUpdateUserRequest $request): JsonResponse
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

    public function login(StoreUpdateLoginRequest $request): JsonResponse
    {
        $data = $request->validated();

        if (!Auth::attempt($data)) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        $user = User::where('email', $data['email'])->firstOrFail();
        return response()->json([
            'access_token' => $user->createToken('api_token')->plainTextToken,
            'token_type' => 'Bearer',
            'user' => new UserResource($user),
        ], 200);
    }

    public function index($companyId): AnonymousResourceCollection
    {
        $users = User::where('company_id', $companyId)->get();
        return UserResource::collection($users);
    }

    public function show(User $user): UserResource
    {
        return new UserResource($user);
    }

}
