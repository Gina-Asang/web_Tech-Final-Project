<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndividualProfileController extends Controller
{
    public function show()
    {
        $user = auth()->user();

        $profile = $user->individualProfile;

        return view('profile.show', compact('user', 'profile'));
    }

    public function edit()
    {
        $user = auth()->user();

        $profile = $user->individualProfile;

        return view('profile.edit', compact('user', 'profile'));
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'headline' => 'nullable|string|max:255',
            'location' => 'nullable|string|max:255',
            'about' => 'nullable|string',
            'interest_mode' => 'nullable|in:offer_services,find_employment,both',
        ]);

        $user = auth()->user();

        $user->individualProfile()->updateOrCreate(
            ['user_id' => $user->id],
            $validated
        );

        return redirect()
            ->route('profile.show')
            ->with('success', 'Profile updated successfully!');
    }
}
