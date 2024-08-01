<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index()
    {
        return Customer::all();
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'inspection_id' => 'required|exists:inspections,id',
            'firstName' => 'required|string',
            'lastName' => 'required|string',
            'birthDate' => 'required|date',
            'phone' => 'required|string',
            'cin' => 'required|string',
            'permis' => 'required|string',
            'address' => 'required|string',
        ]);

        $customer = Customer::create($validatedData);

        return response()->json($customer, 201);
    }

    public function getCustomersByInspectionId($inspectionId)
    {
        // Fetch customers associated with the given inspection_id
        $customers = Customer::where('inspection_id', $inspectionId)->get();
        
        // Return JSON response with customers
        return response()->json(['customers' => $customers]);
    }

}
