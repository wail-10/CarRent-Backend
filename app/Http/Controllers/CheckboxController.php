<?php

namespace App\Http\Controllers;

use App\Models\Checkbox;
use Illuminate\Http\Request;

class CheckboxController extends Controller
{
    public function index()
    {
        return Checkbox::all();
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'x' => 'required|numeric',
            'y' => 'required|numeric',
            'detail' => 'required|string',
            'imageurl' => 'required|string',
            'side' => 'required|string',
            'inspection_id' => 'required|exists:inspections,id'
        ]);

        $checkbox = Checkbox::create($validatedData);

        return response()->json($checkbox, 201);
    }
}
