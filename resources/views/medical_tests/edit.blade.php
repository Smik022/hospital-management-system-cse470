@extends('layouts.app')


@section('main')
<section class="section-5 bg-2">
    <div class="container py-5">
        <div class="row">
            <div class="col">
                <nav aria-label="breadcrumb" class="rounded-3 p-3 mb-4">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('medical_tests.index') }}">Medical Tests</a></li>
                        <li class="breadcrumb-item active">Edit Medical Test</li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3">
                @include('layouts.sidebar')
            </div>
            <div class="col-lg-9">
               
                <form action="{{ route('medical_tests.update', $medicalTest) }}" method="POST">
                    @method('PUT')
                    @csrf
                    <div class="card border-0 shadow mb-4">
                        <div class="card-body card-form p-4">
                            <h3 class="fs-4 mb-1">Edit Medical Test</h3>
                           
                            <div class="row">
                                <div class="col-md-6 mb-4">
                                    <label for="patient_name" class="mb-2">Patient Name<span class="req">*</span></label>
                                    <input type="text" name="patient_name" id="patient_name" class="@error('patient_name') is-invalid @enderror form-control" value="{{ old('patient_name', $medicalTest->patient_name) }}" placeholder="Enter Patient Name" required>
                                    @error('patient_name')
                                        <p class="invalid-feedback">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>


                            <div class="row">
                                <div class="col-md-6 mb-4">
                                    <label for="phone_number" class="mb-2">Phone Number<span class="req">*</span></label>
                                    <input type="text" name="phone_number" id="phone_number" class="@error('phone_number') is-invalid @enderror form-control" value="{{ old('phone_number', $medicalTest->phone_number) }}" placeholder="Enter Phone Number" required>
                                    @error('phone_number')
                                        <p class="invalid-feedback">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-4">
                                    <label for="test_name" class="mb-2">Test Name<span class="req">*</span></label>
                                    <input type="text" name="test_name" id="test_name" class="@error('test_name') is-invalid @enderror form-control" value="{{ old('test_name', $medicalTest->test_name) }}" placeholder="Enter Test Name" required>
                                    @error('test_name')
                                        <p class="invalid-feedback">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>


                            <div class="row">
                                <div class="col-md-6 mb-4">
                                    <label for="test_date" class="mb-2">Test Date<span class="req">*</span></label>
                                    <input type="date" name="test_date" id="test_date" class="@error('test_date') is-invalid @enderror form-control" value="{{ old('test_date', $medicalTest->test_date) }}" required>
                                    @error('test_date')
                                        <p class="invalid-feedback">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-4">
                                    <label for="test_time" class="mb-2">Test Time<span class="req">*</span></label>
                                    <input type="time" name="test_time" id="test_time" class="@error('test_time') is-invalid @enderror form-control" value="{{ old('test_time', $medicalTest->test_time) }}" required>
                                    @error('test_time')
                                        <p class="invalid-feedback">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>


                        <div class="card-footer p-4">
                            <button type="submit" class="btn btn-primary">Update Medical Test</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection
