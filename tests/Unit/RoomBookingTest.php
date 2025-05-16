<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\RoomBooking;
use App\Models\Room;
use App\Models\Patient;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RoomBookingTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_has_the_correct_fillable_attributes()
    {
        $roomBooking = new RoomBooking();

        $this->assertEquals(
            ['patient_id', 'room_id', 'admit_date', 'discharge_date'],
            $roomBooking->getFillable()
        );
    }

    /** @test */
    public function it_belongs_to_a_room()
    {
        $roomBooking = new RoomBooking();

        $this->assertEquals(
            ['patient_id', 'room_id', 'admit_date'],
            $roomBooking->getFillable()
        );
    }

}