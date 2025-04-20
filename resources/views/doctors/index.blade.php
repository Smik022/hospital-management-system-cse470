<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctors</title>
</head>
<body>
    <h1>Doctors</h1>
    <a href="{{ route('doctors.create') }}">Add New Doctor</a>
    <ul>
        @foreach($doctors as $doctor)
            <li>{{ $doctor->name }} - {{ $doctor->specialization }} - <a href="{{ route('doctors.show', $doctor->id) }}">View</a></li>
        @endforeach
    </ul>
</body>
</html>
