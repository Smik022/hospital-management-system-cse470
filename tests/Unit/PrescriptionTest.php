<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Prescription;
use App\Models\Doctor;
use App\Models\Patient;

class PrescriptionTest extends TestCase
{
    use RefreshDatabase;

public function test_prescription_creation_should_fail_with_wrong_data()
{
    // Create doctor and patient
    $doctor = Doctor::create([
        'name' => 'Dr. House',
        'specialization' => 'Diagnostics',
        'contact_number' => '555123456',
        'availability' => '24/7',
    ]);

    $patient = Patient::create([
        'name' => 'Gregory Smith',
        'email' => 'greg@example.com',
        'phone' => '01999999999',
        'address' => 'Fake Street 123',
    ]);

    // Create a valid prescription
    $prescription = Prescription::create([
        'doctor_id' => $doctor->id,
        'patient_id' => $patient->id,
        'prescription_text' => 'One pill per hour',
        'date' => now()->toDateString(),
    ]);

    // 👇 This assertion will fail because we are checking for a wrong doctor_id
    $this->assertDatabaseHas('prescriptions', [
        'id' => $prescription->id,
        'doctor_id' => 9999, // Wrong doctor ID on purpose
    ]);
}
}