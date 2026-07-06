<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Student;

class AuthController extends Controller
{
    // Show login form
    public function showLogin()
    {
        return view('auth.login');
    }

    // Handle login
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            if ($user->status !== 'active') {
                Auth::logout();
                return back()->with('error', 'Your account is not yet approved.');
            }

            if ($user->role === 'admin') {
                return redirect()->route('admin.dashboard');
            } elseif ($user->role === 'teacher') {
                return redirect()->route('teacher.dashboard');
            } else {
                return redirect()->route('parent.dashboard');
            }
        }

        return back()->with('error', 'Invalid email or password.');
    }

    // Show parent registration form
    public function showRegister()
    {
        return view('auth.register');
    }

    // Handle parent registration
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'ic_number' => 'required|string|unique:users|max:20',
            'email' => 'required|email|unique:users|max:255',
            'phone' => 'required|string|max:20',
            'address' => 'required|string',
            'relationship' => 'required|string|max:50',
            'child_ic' => 'required|string|max:20',
            'password' => 'required|min:8|confirmed',
        ]);

        // Create parent account
        $parent = User::create([
            'name' => $request->name,
            'ic_number' => $request->ic_number,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'relationship' => $request->relationship,
            'child_ic' => $request->child_ic,
            'password' => Hash::make($request->password),
            'role' => 'parent',
            'status' => 'pending',
        ]);

        // Try to link student by IC if exists
        $student = Student::where('student_ic', $request->child_ic)->first();
        if ($student && !$student->parent_id) {
            $student->parent_id = $parent->id;
            $student->save();
        }

        return redirect()->route('login')
            ->with('success', 'Registration submitted! Please wait for admin approval.');
    }

    // Logout
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login')->with('success', 'Logged out successfully.');
    }
}