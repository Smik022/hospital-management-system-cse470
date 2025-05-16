@extends('layouts.app')


@section('main')
<section class="section-5 bg-2">
    <div class="container py-5">
        <div class="row">
            <div class="col">
                <nav aria-label="breadcrumb" class="rounded-3 p-3 mb-4">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item active">Add New Medical Test</li>
                    </ol>
                </nav>
            </div>
        </div>
       
        <div class="row">
            <!-- Sidebar Column -->
            <div class="col-lg-3">
                @include('layouts.sidebar') <!-- Assuming you have a sidebar -->
            </div>


            <!-- Form Column -->
            <div class="col-lg-9">
                <div class="card border-0 shadow mb-4">
                    <div class="card-body card-form">
                        <h3 class="fs-4 mb-3">Add New Medical Test</h3>


                        <!-- Medical Test Registration Form -->
                        <form action="{{ route('medical_tests.store') }}" method="POST">
                            @csrf


                            <div class="mb-3">
                                <label for="patient_name" class="mb-1 text-muted">Patient Name*</label>
                                <input type="text" name="patient_name" id="patient_name" class="form-control shadow-sm" placeholder="Enter Patient Name" value="{{ old('patient_name') }}" required>
                            </div>


                            <div class="mb-3">
                                <label for="phone_number" class="mb-1 text-muted">Phone Number*</label>
                                <input type="text" name="phone_number" id="phone_number" class="form-control shadow-sm" placeholder="Enter Phone Number" value="{{ old('phone_number') }}" required>
                            </div>


                            <div class="mb-3">
                                <label for="test_name" class="mb-1 text-muted">Test Name*</label>
                                <input type="text" name="test_name" id="test_name" class="form-control shadow-sm" placeholder="Enter Test Name" value="{{ old('test_name') }}" required>
                            </div>


                            <div class="mb-3">
                                <label for="test_date" class="mb-1 text-muted">Test Date*</label>
                                <input type="date" name="test_date" id="test_date" class="form-control shadow-sm" value="{{ old('test_date') }}" required>
                            </div>


                            <div class="mb-3">
                                <label for="test_time" class="mb-1 text-muted">Test Time*</label>
                                <input type="time" name="test_time" id="test_time" class="form-control shadow-sm" value="{{ old('test_time') }}" required>
                            </div>


                            <button type="submit" class="btn btn-primary btn-block mt-3">Add Medical Test</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
