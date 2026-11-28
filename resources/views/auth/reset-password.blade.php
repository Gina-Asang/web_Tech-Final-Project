<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Reset Password | SkillConnect</title>

    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
</head>

<body>

    <div class="forgot-password-container">

        <div class="forgot-password-card">

            <div class="lock-icon">
                🔒
            </div>

            <h1>Reset Password</h1>

            <p>
                Create a new password for your SkillConnect account.
            </p>

            @if ($errors->any())
                <div class="error-message">
                    {{ $errors->first() }}
                </div>
            @endif

            <form action="{{ route('password.update') }}" method="POST">
                @csrf

                <input type="hidden" name="token" value="{{ $token }}">

                <div class="form-group">
                    <label for="email">Email Address</label>

                    <input
                        type="email"
                        id="email"
                        name="email"
                        value="{{ old('email', $email) }}"
                        required
                    >
                </div>

                <div class="form-group">
                    <label for="password">New Password</label>

                    <input
                        type="password"
                        id="password"
                        name="password"
                        placeholder="Enter your new password"
                        required
                    >
                </div>

                <div class="form-group">
                    <label for="password_confirmation">Confirm New Password</label>

                    <input
                        type="password"
                        id="password_confirmation"
                        name="password_confirmation"
                        placeholder="Confirm your new password"
                        required
                    >
                </div>

                <button type="submit" class="reset-button">
                    Reset Password
                </button>
            </form>

            <a href="{{ route('login') }}" class="back-to-login">
                ← Back to Sign In
            </a>

        </div>

    </div>

</body>
</html>