@extends('layouts.app')

@section('main')
<section class="section py-5">
    <div class="container">
        <h2 class="mb-4 text-center">Explore Departments</h2>

        @forelse($departments as $specialization => $doctors)
            <div class="card shadow-sm mb-4">
                <div class="card-body">
                    <h4 class="card-title">{{ $specialization }}</h4>
                    <ul class="list-group list-group-flush">
                        @foreach($doctors as $doctor)
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <div>
                                    <strong>{{ $doctor->name }}</strong><br>
                                    <small>Contact: {{ $doctor->contact_number }}</small><br>
                                    <small>Availability: {{ $doctor->availability }}</small>
                                </div>
                                <a href="{{ route('appointment.create', ['doctor_id' => $doctor->id]) }}" class="btn btn-sm btn-primary">
                                    Schedule Appointment
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        @empty
            <p class="text-center">No departments found.</p>
        @endforelse
    </div>
</section>
@endsection
