<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\MedicalTest;
use Illuminate\Foundation\Testing\RefreshDatabase;

class MedicalTestTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_has_the_correct_fillable_attributes()
    {
        $medicalTest = new MedicalTest();

        $this->assertEquals(
            ['patient_name', 'phone_number', 'test_name', 'test_date', 'test_time'],
            $medicalTest->getFillable()
        );
    }

    /** @test */
    public function it_allows_mass_assignment_of_fillable_fields()
    {
        $data = [
            'patient_name' => 'Jane Doe',
            'phone_number' => '0123456789',
            'test_name' => 'Blood Test',
            'test_date' => '2025-05-20',
            'test_time' => '10:00 AM',
        ];

        $test = MedicalTest::create($data);

        $this->assertDatabaseHas('medical_tests', [
            'patient_name' => 'Jane Doe',
            'test_name' => 'Blood Test',
        ]);
    }
}