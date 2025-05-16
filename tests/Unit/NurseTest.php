<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Nurse;
use Illuminate\Foundation\Testing\RefreshDatabase;

class NurseTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_has_correct_fillable_attributes()
    {
        $nurse = new Nurse();

        $this->assertEquals(
            ['name', 'contact_number', 'availability'],
            $nurse->getFillable()
        );
    }

    /** @test */
    public function it_can_be_created_with_mass_assignment()
    {
        $data = [
            'name' => 'Sarah Johnson',
            'contact_number' => '0987654321',
            'availability' => 'Available',
        ];

        $nurse = Nurse::create($data);

        $this->assertDatabaseHas('nurses', [
            'name' => 'Sarah Johnson',
            'contact_number' => '0987654321',
        ]);
    }
}