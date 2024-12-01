<x-guest-layout>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background: linear-gradient(to right, #4facfe, #00f2fe);
            color: #fff;
            text-align: center;
        }

        .login-container {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .title {
            font-size: 2.5rem;
            font-weight: bold;
            margin-bottom: 1rem;
            text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.3);
        }

        .subtitle {
            font-size: 1.2rem;
            margin-bottom: 2rem;
        }

        form {
            background: #fff;
            color: #333;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
        }

        label {
            font-size: 1rem;
            font-weight: bold;
            color: #555;
            display: block;
            margin-bottom: 8px;
        }

        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 1rem;
            margin-bottom: 15px;
            box-sizing: border-box;
            transition: border 0.3s;
        }

        input:focus {
            outline: none;
            border: 1px solid #4facfe;
        }

        .btn {
            background: #4facfe;
            color: #fff;
            border: none;
            border-radius: 5px;
            padding: 10px;
            width: 100%;
            font-size: 1rem;
            cursor: pointer;
            transition: background 0.3s ease-in-out;
        }

        .btn:hover {
            background: #3a91ff;
        }

        .link {
            display: block;
            margin-top: 10px;
            text-decoration: none;
            font-size: 0.9rem;
            color: #4facfe;
        }

        .link:hover {
            text-decoration: underline;
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

    <div class="login-container">
        <div class="title">Patients Management System</div>
        <div class="subtitle">Login to continue</div>

        <!-- Login Form -->
        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email Address -->
            <div>
                <label for="email">Email</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="username">
                <x-input-error :messages="$errors->get('email')" />
            </div>

            <!-- Password -->
            <div>
                <label for="password">Password</label>
                <input id="password" type="password" name="password" required autocomplete="current-password">
                <x-input-error :messages="$errors->get('password')" />
            </div>

            <!-- Remember Me -->
            <div>
                <label for="remember_me">
                    <input id="remember_me" type="checkbox" name="remember"> Remember Me
                </label>
            </div>

            <!-- Submit Button -->
            <button type="submit" class="btn">Log In</button>

            <!-- Forgot Password -->
            @if (Route::has('password.request'))
                <a href="{{ route('password.request') }}" class="link">Forgot your password?</a>
            @endif
        </form>
    </div>

    <!-- Footer -->
    <div class="footer">
        &copy; {{ date('Y') }} Patients Management System. Designed with ❤️ by <a href="#">Your Name</a>
    </div>
</x-guest-layout>
