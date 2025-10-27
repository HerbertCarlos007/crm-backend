<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateCustomerRequest;
use App\Http\Resources\CustomerResource;
use App\Models\Customer;

class CustomerController extends Controller
{
    public function store(StoreUpdateCustomerRequest $request)
    {
        $validated = $request->validated();
        $customer = Customer::create($validated);

        return new CustomerResource($customer);
    }

    public function index($companyId)
    {
        $customers = Customer::where('company_id', $companyId)->get();
        return CustomerResource::collection($customers);
    }
}
