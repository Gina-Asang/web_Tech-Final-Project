<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\IndividualProfile;
use App\Models\BusinessProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RegisterController extends Controller
{
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        // Validate the registration form
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'phone' => 'required|string|max:20',
            'account_type' => 'required|in:individual,business',

            // Organization name is only required for business accounts
            'organization_name' => 'nullable|required_if:account_type,business|string|max:255',

            'password' => 'required|string|min:8|confirmed',
            'terms' => 'accepted',
        ]);

        // Create the user and their profile together
        DB::transaction(function () use ($validated) {

            // Create the main user account
            $user = User::create([
                'name' => $validated['name'],
                'email' => $validated['email'],
                'phone' => $validated['phone'],
                'account_type' => $validated['account_type'],
                'password' => $validated['password'],
            ]);

            // Create the appropriate profile
            if ($user->account_type === 'individual') {

                IndividualProfile::create([
                    'user_id' => $user->id,
                ]);

            } elseif ($user->account_type === 'business') {

                BusinessProfile::create([
                    'owner_user_id' => $user->id,
                    'organisation_name' => $validated['organization_name'],
                    'contact_email' => $user->email,
                    'contact_phone' => $user->phone,
                ]);
            }
        });

        return redirect()->route('register')
            ->with('success', 'Your account has been created successfully!');
    }
}