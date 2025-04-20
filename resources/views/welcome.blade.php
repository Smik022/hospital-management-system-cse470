<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>HealthCare Booking</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <style>
        body {
            background: linear-gradient(to right, #f8f9fa, #e0f7fa);
        }
        .hero {
            height: 90vh;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
        }
        .hero h1 {
            font-size: 3rem;
            font-weight: bold;
            color: #2c3e50;
        }
        .hero p {
            font-size: 1.2rem;
            color: #555;
        }
    </style>
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
        <div class="container">
            <a class="navbar-brand fw-bold" href="#">HealthCare</a>
            <div>
                @auth
                    <a href="{{ route('dashboard') }}" class="btn btn-outline-primary">Dashboard</a>
                @else
                    <a href="{{ route('login') }}" class="btn btn-outline-primary me-2">Login</a>
                    <a href="{{ route('register') }}" class="btn btn-primary">Register</a>
                @endauth
            </div>
        </div>
    </nav>

    <div class="hero">
        <div class="container">
            <h1>Welcome to HealthCare Appointment System</h1>
            <p class="my-3">Book appointments with top doctors in just a few clicks.</p>
            <a href="{{ route('register') }}" class="btn btn-lg btn-success mt-3">Get Started</a>
        </div>
    </div>

    <footer class="bg-light text-center py-3">
        <small>© {{ date('Y') }} HealthCare. All rights reserved.</small>
    </footer>

</body>
</html>
