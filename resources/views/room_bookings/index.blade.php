@extends('layouts.app')

@section('main')
<section class="section-5 bg-2">
    <div class="container py-5">
        <div class="row">
            <div class="col">
                <nav aria-label="breadcrumb" class="rounded-3 p-3 mb-4">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item active">Room Bookings</li>
                    </ol>
                </nav>
            </div>
        </div>

        <div class="row">
            <!-- Sidebar Column -->
            <div class="col-lg-3">
                @include('layouts.sidebar') <!-- Including sidebar -->
            </div>

            <!-- Table Column -->
            <div class="col-lg-9">
                <div class="card border-0 shadow mb-4">
                    <div class="card-body">
                        <h3 class="fs-4 mb-3">Room Bookings</h3>

                        @if(session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Patient Name</th>
                                    <th>Room Type</th>
                                    <th>Room Number</th>
                                    <th>Admit Date</th>
                                    <th>Discharge Date</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($bookings as $index => $booking)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $booking->patient->name }}</td>
                                        <td>{{ $booking->room->room_type }}</td>
                                        <td>{{ $booking->room->room_number }}</td>
                                        <td>{{ $booking->admit_date }}</td>
                                        <td>{{ $booking->discharge_date ?? 'N/A' }}</td>
                                        <td>
                                            @if($booking->discharge_date)
                                                <span class="badge bg-success">Discharged</span>
                                            @else
                                                <form action="{{ route('room_bookings.discharge', $booking->id) }}" method="POST" style="display:inline;">
                                                    @csrf
                                                    @method('PUT')
                                                    <button type="submit" class="btn btn-sm btn-danger">Discharge</button>
                                                </form>
                                                <span class="badge bg-warning ms-2">Admitted</span>
                                            @endif
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7">No room bookings found.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div> 
            </div>
        </div>
    </div>
</section>
@endsection
