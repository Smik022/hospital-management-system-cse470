<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    protected $fillable = ['room_type', 'room_number', 'is_occupied'];

    public function bookings()
    {
        return $this->hasMany(RoomBooking::class);
    }
}
