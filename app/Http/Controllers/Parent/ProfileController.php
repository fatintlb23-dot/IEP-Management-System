<?php

namespace App\Http\Controllers\Parent;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function index()
    {
        $parent = Auth::user();
        $children = Student::where('parent_id', $parent->id)->get();
        return view('parent.profile.index', compact('parent', 'children'));
    }

    public function update(Request $request)
    {
        $parent = Auth::user();
        
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $parent->id,
            'ic_number' => 'required|string|max:20',
            'phone' => 'required|string|max:20',
            'address' => 'nullable|string',
            'relationship' => 'nullable|string|max:50',
        ]);

        $parent->update([
            'name' => $request->name,
            'email' => $request->email,
            'ic_number' => $request->ic_number,
            'phone' => $request->phone,
            'address' => $request->address,
            'relationship' => $request->relationship,
        ]);

        return redirect()->route('parent.profile.index')
            ->with('success', 'Profile updated successfully!');
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|min:8|confirmed',
        ]);

        $parent = Auth::user();

        if (!Hash::check($request->current_password, $parent->password)) {
            return back()->with('error', 'Current password is incorrect.');
        }

        $parent->update([
            'password' => Hash::make($request->new_password),
        ]);

        return redirect()->route('parent.profile.index')
            ->with('success', 'Password changed successfully!');
    }

    /**
     * Update the parent profile picture/avatar with 40MB limit.
     */
    public function updateAvatar(Request $request)
    {
        try {
            $request->validate([
                'avatar' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:40960', // 40MB
            ]);

            $parent = Auth::user();

            // Delete old avatar if exists
            if ($parent->avatar && Storage::disk('public')->exists($parent->avatar)) {
                Storage::disk('public')->delete($parent->avatar);
            }

            // Store new avatar
            $path = $request->file('avatar')->store('avatars', 'public');
            
            $parent->update([
                'avatar' => $path,
            ]);

            return redirect()->route('parent.profile.index')
                ->with('success', 'Profile picture updated successfully!');
                
        } catch (\Illuminate\Validation\ValidationException $e) {
            return redirect()->route('parent.profile.index')
                ->with('error', $e->errors()['avatar'][0] ?? 'Validation error');
        } catch (\Exception $e) {
            return redirect()->route('parent.profile.index')
                ->with('error', 'Failed to upload profile picture.');
        }
    }

    /**
     * Remove the parent profile picture/avatar.
     */
    public function removeAvatar()
    {
        try {
            $parent = Auth::user();

            if ($parent->avatar && Storage::disk('public')->exists($parent->avatar)) {
                Storage::disk('public')->delete($parent->avatar);
            }

            $parent->update([
                'avatar' => null,
            ]);

            return redirect()->route('parent.profile.index')
                ->with('success', 'Profile picture removed successfully!');
                
        } catch (\Exception $e) {
            return redirect()->route('parent.profile.index')
                ->with('error', 'Failed to remove profile picture.');
        }
    }
}