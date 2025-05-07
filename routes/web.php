<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PatientController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MedicalRecordController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\PrescriptionController;

Route::prefix('prescriptions')->name('prescriptions.')->group(function () {
    Route::get('/', [PrescriptionController::class, 'index'])->name('index');
    Route::get('/create', [PrescriptionController::class, 'create'])->name('create');
    Route::post('/store', [PrescriptionController::class, 'store'])->name('store');
    Route::get('/list', [PrescriptionController::class, 'list'])->name('list'); // 
});

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

// Patient Routes
Route::get('/',[HomeController::class,'index'])->name('home');
Route::get('/patients/create', [PatientController::class, 'create'])->name('patients.create');
Route::post('/patients/store', [PatientController::class, 'store'])->name('patients.store');
Route::get('/patients/list', [PatientController::class, 'list'])->name('patients.list');


// Doctor Routes
Route::prefix('doctors')->group(function () {
    // Display a list of doctors
    Route::any('/list', [DoctorController::class, 'list'])->name('doctors.list');

    // Show the form to create a new doctor
    Route::any('/create', [DoctorController::class, 'create'])->name('doctors.create');

    // Store a new doctor
    Route::any('/store', [DoctorController::class, 'store'])->name('doctors.store');

    // Show the form to edit an existing doctor
    Route::any('/{doctor}/edit', [DoctorController::class, 'edit'])->name('doctors.edit');

    // Update the doctor record
    Route::put('/{doctor}', [DoctorController::class, 'update'])->name('doctors.update');

    // Delete a doctor from the database
    Route::delete('/{doctor}', [DoctorController::class, 'destroy'])->name('doctors.destroy');
});


// Appointment Routes
Route::prefix('appointments')->name('appointments.')->group(function () {
    Route::any('/create', [AppointmentController::class, 'create'])->name('create');
    Route::any('/store', [AppointmentController::class, 'store'])->name('store');
    Route::any('/list', [AppointmentController::class, 'list'])->name('list');
});



// User register login Routes
Route::get('register', [AuthController::class, 'showRegisterForm'])->name('register.form');
Route::post('register', [AuthController::class, 'register'])->name('auth.register');
Route::get('login', [AuthController::class, 'showLoginForm'])->name('login.form');
Route::post('login', [AuthController::class, 'login'])->name('auth.login');
Route::get('profile', [AuthController::class, 'showProfile'])->name('profile')->middleware('auth');
Route::post('logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');


// Medical Record Routes
Route::middleware(['auth', 'role:doctor,nurse'])->group(function () {
    Route::get('/medical-records', [MedicalRecordController::class, 'index'])->name('medical_records.index');
    Route::post('/medical-records', [MedicalRecordController::class, 'store'])->name('medical_records.store');
    Route::put('/medical-records/{medicalRecord}', [MedicalRecordController::class, 'update'])->name('medical_records.update');
});


// Contact Routes
Route::get('/contact', [ContactController::class, 'index'])->name('contact.index');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');




