<?php


namespace App\Http\Controllers;


use App\Models\MedicalTest;
use Illuminate\Http\Request;


class MedicalTestController extends Controller
{
    // Display a list of medical tests
    public function index()
    {
        // Fetch medical tests with pagination
        $medicalTests = MedicalTest::orderBy('created_at', 'DESC')->paginate(5);


        // Return the list view
        return view('medical_tests.list', compact('medicalTests'));
    }


    // Show form to create a new medical test
    public function create()
    {
        return view('medical_tests.create');
    }


    // Store a new medical test in the database
    public function store(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'patient_name' => 'required|string|max:255',
            'phone_number' => 'required|string|max:15',
            'test_name' => 'required|string|max:255',
            'test_date' => 'required|date',
            'test_time' => 'required|date_format:H:i',
        ]);


        // Create a new medical test
        MedicalTest::create($request->all());


        // Redirect to the medical tests list with success message
        return redirect()->route('medical_tests.index')->with('success', 'Medical test added successfully.');
    }


    // Show form to edit an existing medical test
    public function edit(MedicalTest $medicalTest)
    {
        return view('medical_tests.edit', compact('medicalTest'));
    }


    // Update the medical test record in the database
    public function update(Request $request, MedicalTest $medicalTest)
    {
        // Validate the incoming request data
        $request->validate([
            'patient_name' => 'required|string|max:255',
            'phone_number' => 'required|string|max:15',
            'test_name' => 'required|string|max:255',
            'test_date' => 'required|date',
            'test_time' => 'required|date_format:H:i',
        ]);


        // Update the medical test data
        $medicalTest->update($request->all());


        // Redirect to the medical tests list with success message
        return redirect()->route('medical_tests.index')->with('success', 'Medical test updated successfully.');
    }


    // Delete a medical test from the database
    public function destroy(MedicalTest $medicalTest)
    {
        // Delete the medical test record
        $medicalTest->delete();


        // Redirect to the medical tests list with success message
        return redirect()->route('medical_tests.index')->with('success', 'Medical test deleted successfully.');
    }
}
