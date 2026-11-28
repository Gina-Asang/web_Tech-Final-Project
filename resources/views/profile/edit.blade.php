<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile - SkillConnect</title>
</head>
<body>

    <h1>Edit My Profile</h1>

    <form action="{{ route('profile.update') }}" method="POST">
        @csrf
        @method('PUT')

        <label for="headline">Headline:</label><br>
        <input
            type="text"
            name="headline"
            id="headline"
            value="{{ old('headline', $profile->headline ?? '') }}"
        >
        <br><br>

        <label for="location">Location:</label><br>
        <input
            type="text"
            name="location"
            id="location"
            value="{{ old('location', $profile->location ?? '') }}"
        >
        <br><br>

        <label for="about">About Me:</label><br>
        <textarea
            name="about"
            id="about"
            rows="5"
            cols="40"
        >{{ old('about', $profile->about ?? '') }}</textarea>
        <br><br>

        <label for="interest_mode">What are you interested in?</label><br>

        <select name="interest_mode" id="interest_mode">
            <option value="">Select an option</option>

            <option value="offer_services"
                {{ old('interest_mode', $profile->interest_mode ?? '') == 'offer_services' ? 'selected' : '' }}>
                Offering Services
            </option>

            <option value="find_employment"
                {{ old('interest_mode', $profile->interest_mode ?? '') == 'find_employment' ? 'selected' : '' }}>
                Finding Employment
            </option>

            <option value="both"
                {{ old('interest_mode', $profile->interest_mode ?? '') == 'both' ? 'selected' : '' }}>
                Both
            </option>
        </select>

        <br><br>

        <button type="submit">Save Profile</button>

    </form>

    <br>

    <a href="{{ route('profile.show') }}">Cancel</a>

</body>
</html>