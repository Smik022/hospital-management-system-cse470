<div class="card account-nav border-0 shadow mb-4 mb-lg-0">
    <div class="card-body p-0">
        <ul class="list-group list-group-flush ">
            <li class="list-group-item d-flex justify-content-between p-3">
                <a href="{{ route('patients.list') }}">List of Patients</a>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                <a href="{{ route('doctors.list') }}">List of Doctors</a>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                <a href="{{ route('nurses.list') }}">List of Nurses</a>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                <a href="{{ route('appointments.list') }}">List of Appointments</a>
            </li>
            
            <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                <a href="{{ route('prescriptions.index') }}">List of Prescriptions</a>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                <a href="{{ route('medical_tests.index') }}">List of Tests</a>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                <a href="{{ route('room_bookings.index') }}">Room Bookings</a>
            </li>

        </ul>
    </div>
</div>