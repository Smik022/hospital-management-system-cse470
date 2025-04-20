<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Hospital Management - Home</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f2f2f2;
            padding: 50px;
            text-align: center;
        }
        h1 {
            font-size: 40px;
            margin-bottom: 30px;
        }
        .menu {
            display: flex;
            justify-content: center;
            gap: 20px;
            flex-wrap: wrap;
        }
        .menu a {
            display: inline-block;
            padding: 20px 40px;
            background: #007BFF;
            color: white;
            text-decoration: none;
            font-size: 18px;
            border-radius: 10px;
            transition: background 0.3s ease;
        }
        .menu a:hover {
            background: #0056b3;
        }
    </style>
</head>
<body>

    <h1>🏥 Hospital Management System</h1>

    <div class="menu">
        <a href="{{ route('patients.index') }}">👨‍⚕️ View Patients</a>
        <a href="{{ route('patients.create') }}">➕ Add Patient</a>
        <a href="{{ route('doctors.index') }}">👩‍⚕️ View Doctors</a>
        <a href="{{ route('doctors.create') }}">➕ Add Doctor</a>
    </div>

</body>
</html>
