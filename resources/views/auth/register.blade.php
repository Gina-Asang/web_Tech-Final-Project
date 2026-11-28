<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Join SkillConnect</title>

    <link rel="stylesheet" href="{{ asset('css/landing.css') }}">

    <style>
        .register-page {
            min-height: 100vh;
            background-color: #f8fafc;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 40px 20px;
        }

        .register-card {
            background-color: white;
            width: 100%;
            max-width: 550px;
            padding: 40px;
            border-radius: 16px;
            box-shadow: 0 10px 35px rgba(0, 0, 0, 0.08);
        }

        .register-header {
            text-align: center;
            margin-bottom: 30px;
        }

        .register-header h1 {
            color: #172554;
            font-size: 30px;
            margin-bottom: 10px;
        }

        .register-header p {
            color: #6b7280;
        }

        .register-logo {
            color: #0f766e;
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 20px;
        }

        .register-form .form-group {
            margin-bottom: 20px;
        }

        .register-form label {
            display: block;
            margin-bottom: 8px;
            color: #374151;
            font-weight: 600;
            font-size: 14px;
        }

        .register-form input,
        .register-form select {
            width: 100%;
            padding: 12px 14px;
            border: 1px solid #d1d5db;
            border-radius: 8px;
            font-size: 15px;
            box-sizing: border-box;
            outline: none;
        }

        .register-form input:focus,
        .register-form select:focus {
            border-color: #0f766e;
            box-shadow: 0 0 0 3px rgba(15, 118, 110, 0.1);
        }

        .register-form small {
            color: #6b7280;
            display: block;
            margin-top: 6px;
        }

        .business-fields {
            display: none;
        }

        .terms-group {
            display: flex;
            align-items: flex-start;
            gap: 10px;
            margin-bottom: 25px;
        }

        .terms-group input {
            width: auto;
            margin-top: 4px;
        }

        .terms-group label {
            font-weight: normal;
            line-height: 1.6;
            margin: 0;
        }

        .register-button {
            width: 100%;
            padding: 14px;
            background-color: #0f766e;
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
        }

        .register-button:hover {
            background-color: #115e59;
        }

        .register-footer {
            text-align: center;
            margin-top: 25px;
            color: #6b7280;
        }

        .register-footer a {
            color: #0f766e;
            text-decoration: none;
            font-weight: 600;
        }

        .error-message {
            background-color: #fee2e2;
            color: #991b1b;
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 20px;
        }

        .success-message {
            background-color: #d1fae5;
            color: #065f46;
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 20px;
        }

        @media (max-width: 600px) {
            .register-card {
                padding: 25px;
            }
        }
    </style>
</head>

<body>

    <div class="register-page">

        <div class="register-card">

            <div class="register-header">
                <div class="register-logo">SkillConnect</div>

                <h1>Create your account</h1>

                <p>Join SkillConnect and connect your skills to opportunities.</p>
            </div>

            <form class="register-form" method="POST" action="{{ route('register.store') }}">

                @csrf

                {{-- Display validation errors --}}
                @if ($errors->any())
                    <div class="error-message">
                        <strong>Please correct the following errors:</strong>

                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                {{-- Display success message --}}
                @if (session('success'))
                    <div class="success-message">
                        {{ session('success') }}
                    </div>
                @endif

                <div class="form-group">
                    <label for="name">Full name</label>

                    <input
                        type="text"
                        id="name"
                        name="name"
                        placeholder="Enter your full name"
                        value="{{ old('name') }}"
                        required
                    >
                </div>

                <div class="form-group">
                    <label for="email">Email address</label>

                    <input
                        type="email"
                        id="email"
                        name="email"
                        placeholder="you@example.com"
                        value="{{ old('email') }}"
                        required
                    >
                </div>

                <div class="form-group">
                    <label for="phone">Phone number</label>

                    <input
                        type="tel"
                        id="phone"
                        name="phone"
                        placeholder="Enter your phone number"
                        value="{{ old('phone') }}"
                        required
                    >
                </div>

                <div class="form-group">
                    <label for="account_type">Account type</label>

                    <select id="account_type" name="account_type" required>
                        <option value="">Select account type</option>

                        <option value="individual"
                            {{ old('account_type') == 'individual' ? 'selected' : '' }}>
                            Individual
                        </option>

                        <option value="business"
                            {{ old('account_type') == 'business' ? 'selected' : '' }}>
                            Business
                        </option>
                    </select>
                </div>

                {{-- Business-specific fields --}}
                <div id="businessFields" class="business-fields">

                    <div class="form-group">
                        <label for="organization_name">Organization name</label>

                        <input
                            type="text"
                            id="organization_name"
                            name="organization_name"
                            placeholder="Enter your organization name"
                            value="{{ old('organization_name') }}"
                        >
                    </div>

                </div>

                <div class="form-group">
                    <label for="password">Password</label>

                    <input
                        type="password"
                        id="password"
                        name="password"
                        placeholder="Create a password"
                        required
                    >

                    <small>Choose a secure password.</small>
                </div>

                <div class="form-group">
                    <label for="password_confirmation">Confirm password</label>

                    <input
                        type="password"
                        id="password_confirmation"
                        name="password_confirmation"
                        placeholder="Enter your password again"
                        required
                    >
                </div>

                <div class="terms-group">
                    <input
                        type="checkbox"
                        id="terms"
                        name="terms"
                        value="1"
                        {{ old('terms') ? 'checked' : '' }}
                        required
                    >

                    <label for="terms">
                        I agree to the Terms of Service and Privacy Policy.
                    </label>
                </div>

                <button type="submit" class="register-button">
                    Create Account
                </button>

            </form>

            <div class="register-footer">
                Already have an account?
                <a href="{{ route('login') }}">Sign In</a>
            </div>

        </div>

    </div>

    <script>
        const accountType = document.getElementById('account_type');
        const businessFields = document.getElementById('businessFields');
        const organizationName = document.getElementById('organization_name');

        function toggleBusinessFields() {
            if (accountType.value === 'business') {
                businessFields.style.display = 'block';
                organizationName.required = true;
            } else {
                businessFields.style.display = 'none';
                organizationName.required = false;
                organizationName.value = '';
            }
        }

        accountType.addEventListener('change', toggleBusinessFields);

        // Check the selected account type when the page loads
        toggleBusinessFields();
    </script>

</body>
</html>