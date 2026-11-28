<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Profile - SkillConnect</title>

    <link rel="stylesheet" href="{{ asset('css/profile.css') }}">
</head>
<body>

    <header class="navbar">
        <div class="logo">
            <span class="logo-icon">S</span>
            <span>SkillConnect</span>
        </div>

        <nav>
            <a href="#">Dashboard</a>
            <a href="#">Services</a>
            <a href="#">Jobs</a>
            <a href="#">Bookings</a>
            <a href="#">Messages</a>
            <a href="#">Community</a>
        </nav>

        <div class="nav-user">
            {{ auth()->user()->name }}
        </div>
    </header>

    <main class="profile-container">

        @if (session('success'))
            <div class="success-message">
                {{ session('success') }}
            </div>
        @endif

        <!-- Profile Header -->
        <section class="profile-header">

            <div class="profile-avatar">
                {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
            </div>

            <div class="profile-info">
                <h1>{{ auth()->user()->name }}</h1>

                <p class="headline">
                    {{ $profile->headline ?? 'Add your professional headline' }}
                </p>

                <p class="location">
                    📍 {{ $profile->location ?? 'Add your location' }}
                </p>
            </div>

            <div class="profile-actions">
                <a href="{{ route('profile.edit') }}" class="edit-button">
                    Edit Profile
                </a>
            </div>

        </section>

        <!-- About Section -->
        <section class="profile-card">

            <h2>About</h2>

            <p>
                {{ $profile->about ?? 'You have not added information about yourself yet.' }}
            </p>

        </section>

        <!-- Interest Section -->
        <section class="profile-card">

            <h2>Interests</h2>

            <p>
                @if ($profile && $profile->interest_mode)
                    @if ($profile->interest_mode == 'offer_services')
                        Offering Services
                    @elseif ($profile->interest_mode == 'find_employment')
                        Finding Employment
                    @elseif ($profile->interest_mode == 'both')
                        Offering Services and Finding Employment
                    @endif
                @else
                    No interest selected yet.
                @endif
            </p>

        </section>

        <div class="privacy-notice">
            ℹ️ Your profile information helps other SkillConnect users learn about you.
        </div>

    </main>

</body>
</html>