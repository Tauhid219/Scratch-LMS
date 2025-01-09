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
        $user = Auth::user(); // Get logged-in user
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

        $request->validate([
            'profile_photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'phone_number' => 'nullable|string|max:15',
            'address' => 'nullable|string|max:255',
            'date_of_birth' => 'nullable|date',
            'gender' => 'nullable|string|max:10',
            'bio' => 'nullable|string|max:500',
            'social_links' => 'nullable|array',
        ]);

        // Handle file upload for profile photo
        if ($request->hasFile('profile_photo')) {
            $profilePhoto = $request->file('profile_photo')->store('profile_photos', 'public');
        } else {
            $profilePhoto = $user->profile_photo;
        }

        $user->update([
            'profile_photo' => $profilePhoto,
            'phone_number' => $request->phone_number,
            'address' => $request->address,
            'date_of_birth' => $request->date_of_birth,
            'gender' => $request->gender,
            'bio' => $request->bio,
            'social_links' => $request->social_links,
        ]);

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
