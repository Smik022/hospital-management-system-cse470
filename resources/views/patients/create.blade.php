@extends('layouts.app')

@section('main')  {{-- This matches the section in the layout file --}}
<div class="container">
    <h2>New Prescription</h2>
    <div class="col-lg-3">
        @include('layouts.sidebar')
    </div>
    <form action="{{ route('prescriptions.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label>Doctor</label>
            <select name="doctor_id" class="form-control">
                @foreach($doctors as $doctor)
                    <option value="{{ $doctor->id }}">{{ $doctor->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label>Patient</label>
            <select name="patient_id" class="form-control">
                @foreach($patients as $patient)
                    <option value="{{ $patient->id }}">{{ $patient->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label>Prescription</label>
            <textarea name="prescription_text" class="form-control" rows="5"></textarea>
        </div>

        <div class="form-group">
            <label>Date</label>
            <input type="date" name="date" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary mt-3">Submit</button>
    </form>
</div>
@endsection
