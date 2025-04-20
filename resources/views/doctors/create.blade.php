<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Doctor</title>
</head>
<body>
    <h1>Add Doctor</h1>
    <form action="{{ route('doctors.store') }}" method="POST">
        @csrf
        <label for="name">Name</label>
        <input type="text" name="name" id="name" required>
        <label for="specialization">Specialization</label>
        <input type="text" name="specialization" id="specialization" required>
        <label for="phone">Phone</label>
        <input type="text" name="phone" id="phone" required>
        <button type="submit">Save Doctor</button>
    </form>
</body>
</html>
