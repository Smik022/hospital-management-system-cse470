<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patients</title>
</head>
<body>
    <h1>Patients</h1>
    <a href="{{ route('patients.create') }}">Add New Patient</a>
    <ul>
        @foreach($patients as $patient)
            <li>{{ $patient->name }} - <a href="{{ route('patients.show', $patient->id) }}">View</a></li>
        @endforeach
    </ul>
</body>
</html>
