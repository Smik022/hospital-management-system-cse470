<?php


namespace App\Http\Controllers;


use App\Models\Nurse;
use Illuminate\Http\Request;


class NurseController extends Controller
{
    // Display a list of nurses
    public function list()
    {
        $nurses = Nurse::orderBy('created_at','DESC')->paginate(5);
        return view('nurses.list', compact('nurses'));
    }


    // Show form to create a new nurse
    public function create()
    {
        return view('nurses.create');
    }


    // Store a new nurse in the database
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'contact_number' => 'required|string|max:15',
            'availability' => 'required|string|max:255',
        ]);


        Nurse::create($request->all());


        return redirect()->route('nurses.list')->with('success', 'Nurse added successfully.');
    }


    // Show form to edit an existing nurse
    public function edit(Nurse $nurse)
    {
        return view('nurses.edit', compact('nurse'));
    }


    // Update the nurse record in the database
    public function update(Request $request, Nurse $nurse)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'contact_number' => 'required|string|max:15',
            'availability' => 'required|string|max:255',
        ]);


        $nurse->update($request->all());


        return redirect()->route('nurses.list')->with('success', 'Nurse updated successfully.');
    }


    // Delete a nurse from the database
    public function destroy(Nurse $nurse)
    {
        $nurse->delete();


        return redirect()->route('nurses.list')->with('success', 'Nurse deleted successfully.');
    }
}
