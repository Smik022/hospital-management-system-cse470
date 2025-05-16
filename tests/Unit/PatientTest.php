<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Patient;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PatientTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_has_correct_fillable_attributes()
    {
        $patient = new Patient();

        $this->assertEquals(
            [
                'name',
                'age',
                'gender',
                'phone',
                'address',
                'medical_history',
                'profile_image'
            ],
            $patient->getFillable()
        );
    }

    /** @test */
    public function it_can_be_created_with_mass_assignment()
    {
        $data = [
            'name' => 'John Doe',
            'age' => 30,
            'gender' => 'Male',
            'phone' => '12a34567890',
            'address' => '123 Street',
            'medical_history' => 'No known allergies',
            'profile_image' => 'john.jpg',
        ];

        $patient = Patient::create($data);

        $this->assertDatabaseHas('patients', [
            'name' => 'John Doe',
            'phone' => '1234567890',
        ]);
    }
}