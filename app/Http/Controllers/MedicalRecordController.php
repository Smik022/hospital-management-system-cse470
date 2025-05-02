<?php

namespace App\Http\Controllers;

use App\Models\MedicalRecord;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class MedicalRecordController extends Controller
{
    // Display the list of medical records
    public function index()
    {
        // Check if the user is authorized (role must be 'doctor' or 'nurse')
        $this->authorize('viewAny', MedicalRecord::class);

        // Fetch all medical records
        $medicalRecords = MedicalRecord::orderBy('created_at','DESC')->paginate(5);

        return view('medical_records.index', compact('medicalRecords'));
    }

    // Store a new medical record
    public function store(Request $request)
    {
        $this->authorize('create', MedicalRecord::class);

        $validated = $request->validate([
            'patient_id' => 'required|exists:patients,id',
            'record_date' => 'required|date',
            'diagnosis' => 'required|string',
            'medication' => 'nullable|string',
            'doctor_name' => 'nullable|string',
            'notes' => 'nullable|string',
        ]);

        MedicalRecord::create($validated);

        return redirect()->route('medical_records.index')->with('success', 'Medical record created successfully.');
    }

    // Update an existing medical record
    public function update(Request $request, MedicalRecord $medicalRecord)
    {
        $this->authorize('update', $medicalRecord);

        $validated = $request->validate([
            
            'diagnosis' => 'required|string',
            'medication' => 'nullable|string',
            'doctor_name' => 'nullable|string',
            'notes' => 'nullable|string',
        ]);

        $medicalRecord->update($validated);

        return redirect()->route('medical_records.index')->with('success', 'Medical record updated successfully.');
    }
}

