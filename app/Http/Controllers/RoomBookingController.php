<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Prescription;
use App\Models\Doctor;
use App\Models\Patient;
use App\Models\Room;
use App\Models\RoomBooking;
class RoomBookingController extends Controller
{
    public function create()
    {
        $patients = Patient::all();
        $availableRooms = Room::where('is_occupied', false)->get();
    
        return view('room_bookings.create', compact('patients', 'availableRooms'));
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'patient_id' => 'required|exists:patients,id',
            'room_id' => 'required|exists:rooms,id',
            'admit_date' => 'required|date',
        ]);
    
        RoomBooking::create($request->all());
    
        // Update room status
        Room::find($request->room_id)->update(['is_occupied' => true]);
    
        return redirect()->route('room_bookings.create')->with('success', 'Room successfully booked!');
    }
    public function index()
{
    $bookings = RoomBooking::with('patient', 'room')->latest()->get();

    return view('room_bookings.index', compact('bookings'));
}
public function discharge($id)
{
    $booking = RoomBooking::findOrFail($id);

    if (!$booking->discharge_date) {
        $booking->discharge_date = now();
        $booking->save();

        // Free the room
        $booking->room->update(['is_occupied' => false]);
    }

    return redirect()->route('room_bookings.index')->with('success', 'Patient discharged successfully.');
}
    
}
