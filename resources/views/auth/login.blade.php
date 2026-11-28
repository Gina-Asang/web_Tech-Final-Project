<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | SkillConnect</title>
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">

</head>

<body>

    <div class="login-container">

        <h1>Welcome Back!</h1>

        <p>Log in to your SkillConnect account</p>

        {{-- Display validation errors --}}
        @if ($errors->any())
            <div class="error-message">
                @foreach ($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
        @endif

        {{-- Display success message --}}
        @if (session('success'))
            <div class="success-message">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('login.store') }}" method="POST">

            @csrf

            <div class="form-group">
                <label for="email">Email Address</label>

                <input
                    type="email"
                    id="email"
                    name="email"
                    value="{{ old('email') }}"
                    placeholder="Enter your email"
                    required
                >
            </div>

    <div class="form-group">
                <label for="password">Password</label>

                <div class="password-container">
                    <input
                        type="password"
                        id="password"
                        name="password"
                        placeholder="Enter your password"
                        required
                    >

                    <button type="button" id="togglePassword">
                        Show
                    </button>
                </div>
        </div>

        <div class="forgot-password-link">
                <a href="{{ route('password.request') }}">
                    Forgot Password?
                </a>
            </div>





            <button type="submit" class="login-button">
                Login
            </button>

        </form>

        <div class="register-link">
            <p>Don't have an account?
                <a href="{{ route('register') }}">Register here</a>
            </p>
        </div>

    </div>


    <script>
        const passwordInput = document.getElementById('password');
        const togglePassword = document.getElementById('togglePassword');

        togglePassword.addEventListener('click', function () {
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                togglePassword.textContent = 'Hide';
            } else {
                passwordInput.type = 'password';
                togglePassword.textContent = 'Show';
            }
        });
    </script>

</body>
</html>