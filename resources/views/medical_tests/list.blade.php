@extends('layouts.app')


@section('main')
<section class="section-5 bg-2">
    <div class="container py-5">
        <div class="row">
            <div class="col">
                <nav aria-label="breadcrumb" class="rounded-3 p-3 mb-4">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item active">Medical Tests</li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3">
                @include('layouts.sidebar') <!-- Optional Sidebar -->
            </div>
            <div class="col-lg-9">
                <div class="card border-0 shadow mb-4">
                    <div class="card-body card-form">
                        <div class="d-flex justify-content-between">
                            <div>
                                <h3 class="fs-4 mb-1">Medical Test List</h3>
                            </div>
                           
                        </div>


                        <!-- Display success message -->
                        @if(session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif


                        <!-- Medical Test Table -->
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped">
                                <thead class="bg-light">
                                    <tr>
                                        <th scope="col">Patient Name</th>
                                        <th scope="col">Phone Number</th>
                                        <th scope="col">Test Name</th>
                                        <th scope="col">Test Date</th>
                                        <th scope="col">Test Time</th>
                                        <th scope="col">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($medicalTests as $test)
                                        <tr>
                                            <td>{{ $test->patient_name }}</td>
                                            <td>{{ $test->phone_number }}</td>
                                            <td>{{ $test->test_name }}</td>
                                            <td>{{ $test->test_date }}</td>
                                            <td>{{ $test->test_time }}</td>
                                            <td>
                                                <!-- Edit Button - Green -->
                                                <a href="{{ route('medical_tests.edit', $test) }}" class="btn btn-success btn-sm">Edit</a>


                                                <!-- Delete Button - Dark -->
                                                <form action="{{ route('medical_tests.destroy', $test) }}" method="POST" style="display:inline-block;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-dark btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>


                        <!-- Pagination links -->
                        <div>
                            {{ $medicalTests->links() }}
                        </div>
                    </div>
                </div>                          
            </div>
        </div>
    </div>
</section>
@endsection
