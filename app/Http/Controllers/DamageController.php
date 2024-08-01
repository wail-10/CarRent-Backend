<?php

namespace App\Http\Controllers;

use App\Models\Damage;
use Illuminate\Http\Request;

class DamageController extends Controller
{
    public function index()
    {
        return Damage::all();
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'x' => 'required|numeric',
            'y' => 'required|numeric',
            'detail' => 'required|string',
            'image_url' => 'required|string',
            'side' => 'required|string',
            'inspection_id' => 'required|exists:inspections,id'
        ]);

        $damage = Damage::create($validatedData);

        return response()->json($damage, 201);
    }

    public function getDamagesByInspectionId($inspectionId)
    {
        // Fetch damages associated with the given inspection_id
        $damages = Damage::where('inspection_id', $inspectionId)->get();
        
        // Return JSON response with damages
        return response()->json(['damages' => $damages]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
