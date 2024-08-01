<?php

namespace App\Http\Controllers;

use App\Mail\InspectionDetails;
use App\Models\Inspection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class InspectionController extends Controller
{
    public function index()
    {
        return Inspection::all();
    }

    public function store(Request $request)
    {
        // Validate incoming request data
        $validatedData = $request->validate([
            'vehicle_papers' => 'required|string',
            'cric' => 'required|string',
            'spare_tire' => 'required|string',
            'safety_kit' => 'required|string',
            'fuel_level' => 'required',
            'km_depart' => 'required',
            'km_retour' => 'required',
            'observations' => 'nullable|string',
            'signature' => 'required|string',
        ]);

        // Create a new CarInspection record
        $inspection = Inspection::create($validatedData);

        // Optionally, return the created inspection data as a response
        return response()->json(['inspection' => $inspection], 201);
    }

    public function update(Request $request, $id)
    {
        // Validate incoming request data
        $validatedData = $request->validate([
            'vehicle_papers' => 'required|string',
            'cric' => 'required|string',
            'spare_tire' => 'required|string',
            'safety_kit' => 'required|string',
            'fuel_level' => 'required',
            'km_depart' => 'required',
            'km_retour' => 'required',
            'observations' => 'nullable|string',
            'signature' => 'required|string',
        ]);

        // Fetch inspection data by ID
        $inspection = Inspection::find($id);

        if (!$inspection) {
            return response()->json(['error' => 'Inspection not found'], 404);
        }

        // Update the inspection record
        $inspection->update($validatedData);

        // Optionally, return the updated inspection data as a response
        return response()->json(['inspection' => $inspection], 200);
    }

    public function get(Request $request, $id)
    {
        // Fetch inspection data by ID
        $inspection = Inspection::find($id);

        if (!$inspection) {
            return response()->json(['error' => 'Inspection not found'], 404);
        }

        // Return inspection data as JSON response
        return response()->json(['inspection' => $inspection], 200);
    }

    public function destroy($id)
    {
        // Fetch inspection data by ID
        $inspection = Inspection::find($id);

        if (!$inspection) {
            return response()->json(['error' => 'Inspection not found'], 404);
        }

        // Delete the inspection record
        $inspection->delete();

        // Optionally, return a success response
        return response()->json(['message' => 'Inspection deleted successfully'], 200);
    }

    public function sendPdf(Request $request)
    {
        // Validate incoming request
        $request->validate([
            'email' => 'required|string',
            'pdf' => 'required|file|mimes:pdf',
            'caseType' => 'required|string'
        ]);

        // Process the PDF and email
        $pdfFile = $request->file('pdf');
        $email = $request->input('email');
        $caseType = $request->input('caseType');

        $tempFilePath = tempnam(sys_get_temp_dir(), 'inspection_') . '.pdf';

        file_put_contents($tempFilePath, file_get_contents($pdfFile->getRealPath()));

        Mail::to($email)->send(new InspectionDetails($tempFilePath, $caseType));

        unlink($tempFilePath);

        // Respond with success message
        return response()->json(['message' => 'PDF received and email processed successfully']);
    }

}
