<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Doctor;
use App\Models\Prescription;
use Illuminate\Database\Eloquent\Relations\HasMany;

class DoctorTest extends TestCase
{
    /** @test */
    public function it_has_fillable_attributes()
    {
        $doctor = new Doctor();

        $this->assertEquals(
            ['name', 'specialization', 'contact_number', 'availability'],
            $doctor->getFillable()
        );
    }

    /** @test */
    public function it_has_many_prescriptions()
    {
        $doctor = new Doctor();

        $this->assertInstanceOf(HasMany::class, $doctor->prescriptions());
        $this->assertEquals('doctor_id', $doctor->prescriptions()->getForeignKeyName());
    }
}
