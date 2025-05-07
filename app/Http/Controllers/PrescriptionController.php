<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Prescription;
use App\Models\Doctor;
use App\Models\Patient;

class PrescriptionController extends Controller
{
    // Shows paginated prescriptions (index page)
    public function index()
    {
        $prescriptions = Prescription::with(['doctor', 'patient'])->paginate(5);
        return view('prescriptions.index', compact('prescriptions'));
    }

    // Shows form to create a new prescription
    public function create()
    {
        $doctors = Doctor::all();
        $patients = Patient::all();
        return view('prescriptions.create', compact('doctors', 'patients'));
    }

    // Stores new prescription
    public function store(Request $request)
    {
        $request->validate([
            'doctor_id' => 'required|exists:doctors,id',
            'patient_id' => 'required|exists:patients,id',
            'prescription_text' => 'required|string',
            'date' => 'required|date',
        ]);

        Prescription::create($request->all());

        return redirect()->route('prescriptions.index')->with('success', 'Prescription created successfully.');
    }

    // ✅ NEW: List method to support /prescriptions/list
    public function list()
    {
        $prescriptions = Prescription::with(['doctor', 'patient'])->paginate(10);
        return view('prescriptions.index', compact('prescriptions'));
    }
}