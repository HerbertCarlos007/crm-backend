<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateCompanyRequest;
use App\Http\Resources\CompanyResource;
use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function store(StoreUpdateCompanyRequest $request)
    {
        $validated = $request->validated();

        $company = Company::create($validated);

        return new CompanyResource($company);
    }
}
