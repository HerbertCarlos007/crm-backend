<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateCompanyRequest;
use App\Http\Resources\CompanyResource;
use App\Models\Company;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;

class CompanyController extends Controller
{
    public function store(StoreUpdateCompanyRequest $request): CompanyResource
     {
        $logoPath = null;
        $logoUrl = null;

      if($request->hasFile('logo_url')) {
          $logoPath = request()->file('logo_url')->store('avatars', 's3');
          Storage::disk('s3')->setVisibility($logoPath, 'public');

          $logoUrl = Storage::disk('s3')->url($logoPath);
      }

        $validated = $request->validated();
        $validated['logo_url'] = $logoUrl;

        $company = Company::create($validated);

        return new CompanyResource($company);
    }

    public function index(): AnonymousResourceCollection
    {
        return CompanyResource::collection(Company::all());
    }

    public function show(Company $company): CompanyResource
    {
        return new CompanyResource($company);
    }

    public function update(StoreUpdateCompanyRequest $request, Company $company): CompanyResource
    {
        $validated = $request->validated();
        $company->update($validated);

        return new CompanyResource($company);
    }

    public function destroy(Company $company): Response
    {
        $company->delete();
        return response()->noContent();
    }
}
