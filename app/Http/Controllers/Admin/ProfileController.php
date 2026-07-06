<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    /**
     * Display the admin profile page.
     */
    public function index()
    {
        $admin = Auth::user();
        return view('admin.profile.index', compact('admin'));
    }

    /**
     * Update the admin profile information.
     */
    public function update(Request $request)
    {
        $admin = Auth::user();
        
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $admin->id,
            'ic_number' => 'required|string|max:20',
            'phone' => 'required|string|max:20',
            'position' => 'nullable|string|max:255',
        ]);

        $admin->update([
            'name' => $request->name,
            'email' => $request->email,
            'ic_number' => $request->ic_number,
            'phone' => $request->phone,
            'position' => $request->position,
        ]);

        return redirect()->route('admin.profile.index')
            ->with('success', 'Profile updated successfully!');
    }

    /**
     * Update the admin password.
     */
    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|min:8|confirmed',
        ]);

        $admin = Auth::user();

        if (!Hash::check($request->current_password, $admin->password)) {
            return back()->with('error', 'Current password is incorrect.');
        }

        $admin->update([
            'password' => Hash::make($request->new_password),
        ]);

        return redirect()->route('admin.profile.index')
            ->with('success', 'Password changed successfully!');
    }

    /**
     * Update the admin profile picture/avatar with 40MB limit.
     */
    public function updateAvatar(Request $request)
    {
        try {
            $request->validate([
                'avatar' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:40960', // 40MB
            ]);

            $admin = Auth::user();

            // Delete old avatar if exists
            if ($admin->avatar && Storage::disk('public')->exists($admin->avatar)) {
                Storage::disk('public')->delete($admin->avatar);
            }

            // Store new avatar
            $path = $request->file('avatar')->store('avatars', 'public');
            
            $admin->update([
                'avatar' => $path,
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Profile picture updated successfully!',
                'path' => $path
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'success' => false,
                'message' => $e->errors()['avatar'][0] ?? 'Validation error'
            ], 422);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Remove the admin profile picture/avatar.
     */
    public function removeAvatar()
    {
        try {
            $admin = Auth::user();

            if ($admin->avatar && Storage::disk('public')->exists($admin->avatar)) {
                Storage::disk('public')->delete($admin->avatar);
            }

            $admin->update([
                'avatar' => null,
            ]);

            if (request()->ajax()) {
                return response()->json([
                    'success' => true,
                    'message' => 'Profile picture removed successfully!'
                ]);
            }

            return redirect()->route('admin.profile.index')
                ->with('success', 'Profile picture removed successfully!');
        } catch (\Exception $e) {
            if (request()->ajax()) {
                return response()->json([
                    'success' => false,
                    'message' => $e->getMessage()
                ], 500);
            }
            return redirect()->route('admin.profile.index')
                ->with('error', 'Failed to remove profile picture.');
        }
    }
}