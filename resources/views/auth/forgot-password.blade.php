<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Forgot Password | SkillConnect</title>

    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
</head>

<body>

    <div class="forgot-password-container">

        <div class="forgot-password-card">

            <div class="lock-icon">
                🔒
            </div>

            <h1>Forgot Password?</h1>

            <p>
                Don't worry! Enter your email address and we'll send you
                a link to reset your password.
            </p>

            @if (session('status'))
                <div class="success-message">
                    {{ session('status') }}
                </div>
            @endif

            @if ($errors->any())
                <div class="error-message">
                    {{ $errors->first('email') }}
                </div>
            @endif

            <form action="{{ route('password.email') }}" method="POST">
                @csrf

                <div class="form-group">
                    <label for="email">Email Address</label>

                    <input
                        type="email"
                        id="email"
                        name="email"
                        placeholder="Enter your email address"
                        value="{{ old('email') }}"
                        required
                    >
                </div>

                <button type="submit" class="reset-button">
                    Send Reset Link
                </button>
            </form>

            <a href="{{ route('login') }}" class="back-to-login">
                ← Back to Sign In
            </a>

        </div>

    </div>

</body>
</html>