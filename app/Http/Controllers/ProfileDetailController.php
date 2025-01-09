<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // Display the logged-in user's profile
    public function index()
    {
        $user = Auth::user()->load('socialLinks'); // Load social links with the user
        return view('admin.profiledetail.index', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    // Show the edit form for the logged-in user
    public function edit()
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $user = Auth::user(); // Get logged-in user

        // Validate the request data
        $validatedData = $request->validate([
            'profile_photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'phone_number' => 'nullable|string|max:15',
            'address' => 'nullable|string|max:255',
            'date_of_birth' => 'nullable|date',
            'gender' => 'nullable|string|max:10',
            'bio' => 'nullable|string|max:500',
            'social_links.facebook' => 'nullable|url|max:255',
            'social_links.twitter' => 'nullable|url|max:255',
            'social_links.linkedin' => 'nullable|url|max:255',
            'social_links.telegram' => 'nullable|url|max:255',
        ]);

        // Handle file upload for profile photo
        if ($request->hasFile('profile_photo')) {
            $profilePhoto = $request->file('profile_photo')->store('profile_photos', 'public');
        } else {
            $profilePhoto = $user->profile_photo;
        }

        // Update the user's main profile data
        $user->update($validatedData);

        // Update or create social links
        if (isset($validatedData['social_links'])) {
            $user->socialLinks()->updateOrCreate(
                ['user_id' => $user->id], // Matching condition
                $validatedData['social_links'] // Data to update
            );
        }

        return redirect()->route('profile-details.index')->with('success', 'Profile updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
