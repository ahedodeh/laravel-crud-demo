<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Customer;
use App\Http\Requests\V1\StorecustomerRequest;
use App\Http\Requests\V1\UpdatecustomerRequest;

use App\Http\Controllers\Controller;

use App\Http\Resources\V1\CustomerCollection;
use App\Http\Resources\V1\CustomerResource;


class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return new CustomerCollection(Customer::paginate());
    }

   

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorecustomerRequest $request)
    {
        return new CustomerResource(Customer::create($request->all()));
    }

    /**
     * Display the specified resource.
     */
    public function show(customer $customer)
    {
        return new CustomerResource($customer);
    }

  
    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatecustomerRequest $request, customer $customer)
{
    
    \Illuminate\Support\Facades\Log::info("Request Method:". $request->method());

    $customer->update($request->all());

    return response()->json([
        'message' => 'Customer updated successfully',
        'customer' => new CustomerResource($customer),
        'log' => "Request Method: " . $request->method(),
    ]);
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Customer $customer)
{
        $customer->delete();

        return new CustomerResource($customer);
    
}

}
