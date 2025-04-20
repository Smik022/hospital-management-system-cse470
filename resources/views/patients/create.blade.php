<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Patient</title>
</head>
<body>
    <h1>Add Patient</h1>
    <form action="{{ route('patients.store') }}" method="POST">
        @csrf
        <label for="name">Name</label>
        <input type="text" name="name" id="name" required>
        <label for="email">Email</label>
        <input type="email" name="email" id="email" required>
        <label for="phone">Phone</label>
        <input type="text" name="phone" id="phone" required>
        <label for="address">Address</label>
        <textarea name="address" id="address" required></textarea>
        <button type="submit">Save Patient</button>
    </form>
</body>
</html>
