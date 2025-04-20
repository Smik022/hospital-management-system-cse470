<!-- resources/views/patients/doctors.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2>Available Doctors</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @foreach ($doctors as $doctor)
        <div class="card mb-3">
            <div class="card-body">
                <h5>{{ $doctor->name }}</h5>
                <p>Specialization: {{ $doctor->specialization }}</p>

                <form method="POST" action="{{ route('appointment.book') }}">
                    @csrf
                    <input type="hidden" name="doctor_id" value="{{ $doctor->id }}">
                    <div class="mb-2">
                        <label>Select Appointment Date:</label>
                        <input type="date" name="appointment_date" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-success">Book Appointment</button>
                </form>
            </div>
        </div>
    @endforeach
</div>
@endsection
