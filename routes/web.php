<?php
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PatientController;
use Illuminate\Support\Facades\Route;

// Home route
Route::get('/', function () {
    return view('welcome');
});

// Dashboard route
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Patient registration and appointment routes
Route::middleware('auth')->group(function () {
    // Show registration form for patients
    Route::get('/patient/register', [PatientController::class, 'showRegisterForm'])->name('patient.register');
    // Register a patient (POST)
    Route::post('/patient/register', [PatientController::class, 'register']);
    // Show the available doctors
    Route::get('/doctors', [PatientController::class, 'showDoctors'])->name('patient.doctors');
    // Book an appointment (POST)
    Route::post('/appointment', [PatientController::class, 'bookAppointment'])->name('appointment.book');
});

// Profile-related routes
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Auth routes
require __DIR__.'/auth.php';
