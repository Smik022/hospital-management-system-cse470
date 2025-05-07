@extends('layouts.app')

@section('main')
<section class="section-5 bg-2">
    <div class="container py-5">
        <div class="row">
            <div class="col">
                <nav aria-label="breadcrumb" class="rounded-3 p-3 mb-4">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('prescriptions.index') }}">Prescriptions</a></li>
                        <li class="breadcrumb-item active">Issue Prescription</li>
                    </ol>
                </nav>
            </div>
        </div>

        <div class="row">
            <!-- Sidebar Column -->
            <div class="col-lg-3">
                @include('layouts.sidebar')
            </div>

            <!-- Form Column -->
            <div class="col-lg-9">
                <div class="card border-0 shadow mb-4">
                    <div class="card-body card-form">
                        <h3 class="fs-4 mb-3">Issue a New Prescription</h3>

                        <!-- Prescription Creation Form -->
                        <form action="{{ route('prescriptions.store') }}" method="POST">
                            @csrf

                            <div class="mb-3">
                                <label for="doctor_id" class="mb-1 text-muted">Doctor*</label>
                                <select name="doctor_id" id="doctor_id" class="form-control shadow-sm" required>
                                    @foreach($doctors as $doctor)
                                        <option value="{{ $doctor->id }}">{{ $doctor->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="patient_id" class="mb-1 text-muted">Patient*</label>
                                <select name="patient_id" id="patient_id" class="form-control shadow-sm" required>
                                    @foreach($patients as $patient)
                                        <option value="{{ $patient->id }}">{{ $patient->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="prescription_text" class="mb-1 text-muted">Prescription*</label>
                                <textarea name="prescription_text" id="prescription_text" class="form-control shadow-sm" rows="5" placeholder="Enter Prescription Details" required></textarea>
                            </div>

                            <div class="mb-3">
                                <label for="date" class="mb-1 text-muted">Date*</label>
                                <input type="date" name="date" id="date" class="form-control shadow-sm" required>
                            </div>

                            <button type="submit" class="btn btn-primary btn-block mt-3">Issue Prescription</button>
                        </form>
                    </div>
                </div> 
            </div>
        </div>
    </div>
</section>
@endsection
