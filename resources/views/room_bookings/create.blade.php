@extends('layouts.app')

@section('main')
<section class="section-5 bg-2">
    <div class="container py-5">
        <div class="row">
            <div class="col">
                <nav aria-label="breadcrumb" class="rounded-3 p-3 mb-4">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('room_bookings.index') }}">Room Bookings</a></li>
                        <li class="breadcrumb-item active">Book Room</li>
                    </ol>
                </nav>
            </div>
        </div>

        <div class="row">
            <!-- Sidebar Column -->
            <div class="col-lg-3">
                @include('layouts.sidebar') <!-- Including sidebar -->
            </div>

            <!-- Form Column -->
            <div class="col-lg-9">
                <div class="card border-0 shadow mb-4">
                    <div class="card-body card-form">
                        <h3 class="fs-4 mb-3">Book a Room</h3>

                        <!-- Room Booking Form -->
                        <form action="{{ route('room_bookings.store') }}" method="POST">
                            @csrf

                            <div class="mb-3">
                                <label for="patient_id" class="mb-1 text-muted">Select Patient*</label>
                                <select name="patient_id" class="form-control shadow-sm" required>
                                    <option value="">Choose Patient</option>
                                    @foreach($patients as $patient)
                                        <option value="{{ $patient->id }}">{{ $patient->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="room_id" class="mb-1 text-muted">Select Room*</label>
                                <select name="room_id" class="form-control shadow-sm" required>
                                    <option value="">Choose Room</option>
                                    @foreach($availableRooms as $room)
                                        <option value="{{ $room->id }}">{{ $room->room_type }} - {{ $room->room_number }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="admit_date" class="mb-1 text-muted">Admit Date*</label>
                                <input type="datetime-local" name="admit_date" class="form-control shadow-sm" required>
                            </div>

                            <button type="submit" class="btn btn-primary btn-block mt-3">Book Room</button>
                        </form>
                    </div>
                </div> 
            </div>
        </div>
    </div>
</section>
@endsection
