@extends('layouts.app')

@section('main')
<section class="section-5 bg-2">
    <div class="container py-5">
        <div class="row">
            <div class="col">
                <!-- Breadcrumb -->
                <nav aria-label="breadcrumb" class="rounded-3 p-3 mb-4 bg-light">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Account Settings</li>
                    </ol>
                </nav>
            </div>
        </div>

        <div class="row">
            <!-- Sidebar -->
            <div class="col-lg-3">
                @include('layouts.sidebar')
            </div>

            <!-- Profile Section -->
            <div class="col-lg-9">
                <div class="card border-0 shadow mb-4">
                    <div class="card-body p-4">
                        <h3 class="fs-4 mb-3 text-center">Welcome, {{ auth()->user()->name }}!</h3>

                        @if(session('success'))
                            <div class="alert alert-success">{{ session('success') }}</div>
                        @endif

                        <!-- Profile Info -->
                        <div id="profileDisplay">
                            <div class="mb-3">
                                <label class="form-label">Name:</label>
                                <p class="form-control">{{ auth()->user()->name }}</p>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Email:</label>
                                <p class="form-control">{{ auth()->user()->email }}</p>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Role:</label>
                                <p class="form-control">{{ ucfirst(auth()->user()->role) }}</p>
                            </div>

                            <div class="text-center">
                                <button class="btn btn-primary" onclick="toggleEdit()">Edit Profile</button>
                            </div>
                        </div>

                        <!-- Edit Profile Form (hidden by default) -->
                        <form id="editForm" action="{{ route('profile.update') }}" method="POST" style="display:none;">
                            @csrf
                            @method('PUT')

                            <!-- form fields for name, email, password etc. -->
                            
                        
                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" name="name" class="form-control" value="{{ auth()->user()->name }}" required>
                                @error('name') <div class="text-danger">{{ $message }}</div> @enderror
                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" name="email" class="form-control" value="{{ auth()->user()->email }}" required>
                                @error('email') <div class="text-danger">{{ $message }}</div> @enderror
                            </div>

                            <div class="mb-3">
                                <label for="password" class="form-label">New Password (leave blank to keep current)</label>
                                <input type="password" name="password" class="form-control">
                                @error('password') <div class="text-danger">{{ $message }}</div> @enderror
                            </div>

                            <div class="mb-3">
                                <label for="password_confirmation" class="form-label">Confirm New Password</label>
                                <input type="password" name="password_confirmation" class="form-control">
                            </div>

                            <div class="text-center">
                                <button type="submit" class="btn btn-success">Save Changes</button>
                                <button type="button" class="btn btn-secondary ms-2" onclick="toggleEdit()">Cancel</button>
                            </div>
                        </form>
                    </div>

                    <!-- Logout Button -->
                    <div class="text-center my-3">
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-danger">Logout</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- JavaScript to toggle edit form -->
<script>
    function toggleEdit() {
        const display = document.getElementById('profileDisplay');
        const form = document.getElementById('editForm');
        display.style.display = display.style.display === 'none' ? 'block' : 'none';
        form.style.display = form.style.display === 'none' ? 'block' : 'none';
    }
</script>
@endsection
