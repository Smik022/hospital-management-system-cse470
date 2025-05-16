<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PatientController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\PrescriptionController;
use App\Http\Controllers\NurseController;
use App\Http\Controllers\MedicalTestController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\RoomBookingController;



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
Route::get('/home',[HomeController::class,'index'])->name('home');
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

// Nurse Routes
Route::prefix('nurses')->group(function () {
    // Display a list of nurses
    Route::any('/list', [NurseController::class, 'list'])->name('nurses.list');


    // Show the form to create a new nurse
    Route::any('/create', [NurseController::class, 'create'])->name('nurses.create');


    // Store a new nurse
    Route::any('/store', [NurseController::class, 'store'])->name('nurses.store');


    // Show the form to edit an existing nurse
    Route::any('/{nurse}/edit', [NurseController::class, 'edit'])->name('nurses.edit');


    // Update the nurse record
    Route::put('/{nurse}', [NurseController::class, 'update'])->name('nurses.update');


    // Delete a nurse from the database
    Route::delete('/{nurse}', [NurseController::class, 'destroy'])->name('nurses.destroy');
});


// Appointment Routes
Route::prefix('appointments')->name('appointments.')->group(function () {
    Route::any('/create', [AppointmentController::class, 'create'])->name('create');
    Route::any('/store', [AppointmentController::class, 'store'])->name('store');
    Route::any('/list', [AppointmentController::class, 'list'])->name('list');
});

// Medical Test Routes


Route::prefix('medical_tests')->group(function () {
    // Display list of medical tests (GET)
    Route::get('/list', [MedicalTestController::class, 'index'])->name('medical_tests.index');
   
    // Show create form (GET)
    Route::get('/create', [MedicalTestController::class, 'create'])->name('medical_tests.create');
   
    // Store new medical test (POST)
    Route::post('/', [MedicalTestController::class, 'store'])->name('medical_tests.store');
   
    // Show edit form (GET)
    Route::get('/{medicalTest}/edit', [MedicalTestController::class, 'edit'])->name('medical_tests.edit');
   
    // Update medical test (PUT/PATCH)
    Route::put('/{medicalTest}', [MedicalTestController::class, 'update'])->name('medical_tests.update');
   
    // Delete medical test (DELETE)
    Route::delete('/{medicalTest}', [MedicalTestController::class, 'destroy'])->name('medical_tests.destroy');
});

// User register login Routes
Route::get('/', [AuthController::class, 'showRegisterForm'])->name('register.form');
Route::post('/', [AuthController::class, 'register'])->name('auth.register');
Route::get('login', [AuthController::class, 'showLoginForm'])->name('login.form');
Route::post('login', [AuthController::class, 'login'])->name('auth.login');
Route::get('profile', [AuthController::class, 'showProfile'])->name('profile')->middleware('auth');
Route::post('profile', [AuthController::class, 'showProfile'])->name('profile')->middleware('auth');
// Profile Update Route
Route::put('profile/update', [ProfileController::class, 'update'])->name('profile.update')->middleware('auth');
Route::post('logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');


// User Department Routes

Route::get('/departments', [DepartmentController::class, 'index'])->name('departments.index');
Route::get('/departments', [DoctorController::class, 'exploreDepartments'])->name('departments.index');
Route::get('/appointments/create', [AppointmentController::class, 'create'])->name('appointment.create');


Route::get('/room-bookings/create', [RoomBookingController::class, 'create'])->name('room_bookings.create');
Route::post('/room-bookings', [RoomBookingController::class, 'store'])->name('room_bookings.store');
Route::get('/room-bookings', [RoomBookingController::class, 'index'])->name('room_bookings.index');
Route::get('/room-booking/create', [RoomBookingController::class, 'create'])->name('room_booking.create');


Route::put('/room_bookings/{id}/discharge', [RoomBookingController::class, 'discharge'])->name('room_bookings.discharge');

