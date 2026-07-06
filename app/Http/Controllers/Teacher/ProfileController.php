<?php

namespace App\Http\Controllers\Teacher;

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
        $teacher = Auth::user();
        $studentCount = Student::where('teacher_id', $teacher->id)->count();
        return view('teacher.profile.index', compact('teacher', 'studentCount'));
    }

    public function update(Request $request)
    {
        $teacher = Auth::user();
        
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $teacher->id,
            'ic_number' => 'required|string|max:20',
            'phone' => 'required|string|max:20',
            'position' => 'required|string|max:255',
            'qualification' => 'required|string|max:255',
        ]);

        $teacher->update([
            'name' => $request->name,
            'email' => $request->email,
            'ic_number' => $request->ic_number,
            'phone' => $request->phone,
            'position' => $request->position,
            'qualification' => $request->qualification,
        ]);

        return redirect()->route('teacher.profile.index')
            ->with('success', 'Profile updated successfully!');
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|min:8|confirmed',
        ]);

        $teacher = Auth::user();

        if (!Hash::check($request->current_password, $teacher->password)) {
            return redirect()->route('teacher.profile.index')
                ->with('error', 'Current password is incorrect.');
        }

        $teacher->update([
            'password' => Hash::make($request->new_password),
        ]);

        return redirect()->route('teacher.profile.index')
            ->with('success', 'Password changed successfully!');
    }

    public function updateAvatar(Request $request)
    {
        try {
            $request->validate([
                'avatar' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:40960',
            ]);

            $teacher = Auth::user();

            if ($teacher->avatar && Storage::disk('public')->exists($teacher->avatar)) {
                Storage::disk('public')->delete($teacher->avatar);
            }

            $path = $request->file('avatar')->store('avatars', 'public');
            
            $teacher->update([
                'avatar' => $path,
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Profile picture updated successfully!',
                'path' => $path
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ], 500);
        }
    }

    public function removeAvatar()
    {
        try {
            $teacher = Auth::user();

            if ($teacher->avatar && Storage::disk('public')->exists($teacher->avatar)) {
                Storage::disk('public')->delete($teacher->avatar);
            }

            $teacher->update([
                'avatar' => null,
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Profile picture removed successfully!'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ], 500);
        }
    }
}