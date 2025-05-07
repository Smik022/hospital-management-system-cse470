@extends('layouts.app')

@section('main')
<section class="section-5 bg-2">
    <div class="container py-5">
        <div class="row">
            <div class="col">
                <nav aria-label="breadcrumb" class="rounded-3 p-3 mb-4">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item active">Prescription List</li>
                    </ol>
                </nav>
            </div>
        </div>

        <div class="row">
            <!-- Sidebar Column -->
            <div class="col-lg-3">
                @include('layouts.sidebar')
            </div>

            <!-- Prescription List Column -->
            <div class="col-lg-9">
                <div class="card border-0 shadow mb-4">
                    <div class="card-body">
                        <h3 class="fs-4 mb-3">Prescription List</h3>

                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Doctor</th>
                                    <th>Patient</th>
                                    <th>Prescription</th>
                                    <th>Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($prescriptions as $prescription)
                                    <tr>
                                        <td>{{ $prescription->doctor->name }}</td>
                                        <td>{{ $prescription->patient->name }}</td>
                                        <td>{{ $prescription->prescription_text }}</td>
                                        <td>{{ $prescription->date }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        {{ $prescriptions->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
