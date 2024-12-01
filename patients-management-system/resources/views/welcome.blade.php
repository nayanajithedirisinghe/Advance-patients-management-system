<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patients Management System</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background: linear-gradient(to right, #4facfe, #00f2fe);
            color: #fff;
            text-align: center;
        }

        .welcome-container {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .title {
            font-size: 3rem;
            font-weight: bold;
            margin-bottom: 1rem;
            text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.3);
        }

        .subtitle {
            font-size: 1.5rem;
            margin-bottom: 2rem;
        }

        .buttons {
            margin-top: 2rem;
        }

        .btn {
            display: inline-block;
            padding: 10px 20px;
            font-size: 1rem;
            font-weight: bold;
            text-transform: uppercase;
            border: none;
            border-radius: 5px;
            background: #fff;
            color: #4facfe;
            text-decoration: none;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2);
            transition: all 0.3s ease-in-out;
            margin: 0 10px;
        }

        .btn:hover {
            background: #4facfe;
            color: #fff;
            box-shadow: 0 6px 8px rgba(0, 0, 0, 0.3);
        }

        .footer {
            position: fixed;
            bottom: 10px;
            width: 100%;
            text-align: center;
            font-size: 0.9rem;
            color: rgba(255, 255, 255, 0.7);
        }

        .footer a {
            color: #fff;
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="welcome-container">
        <div class="title">Welcome to Patients Management System</div>
        <div class="subtitle">Simplifying Healthcare Management for Patients and Doctors</div>
        
        <div>
            @if (Route::has('login'))
                <div>
                    @auth
                        <a href="{{ url('/dashboard') }}" class="btn">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="btn">Log In</a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="btn">Register</a>
                        @endif
                    @endauth
                </div>
            @endif
        </div>
    </div>
    <div class="footer">
        &copy; {{ date('Y') }} Patients Management System. Designed with ❤️ by <a href="#">Your Name</a>
    </div>
</body>
</html>


           