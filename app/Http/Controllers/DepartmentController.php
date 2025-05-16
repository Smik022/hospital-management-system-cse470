<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    // Display all departments with their doctors
    public function index()
    {
        // Eager load the doctors for each department
        $departments = Department::with('doctors')->get();

        // Return the view with the departments data
        return view('departments.index', compact('departments'));
    }
}

