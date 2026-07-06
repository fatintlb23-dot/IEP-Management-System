<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\TeacherWelcomeMail;

class TeacherController extends Controller
{
    public function index(Request $request)
    {
        $query = User::where('role', 'teacher');
        
        if ($request->has('search') && $request->search) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('ic_number', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%");
            });
        }
        
        $teachers = $query->paginate(10);
        return view('admin.teachers.index', compact('teachers'));
    }

    public function create()
    {
        return view('admin.teachers.create');
    }

    public function store(Request $request)
    {
        // Validate the request
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'ic_number' => 'required|string|unique:users,ic_number',
            'phone' => 'required|string|max:20',
            'position' => 'required|string|max:255',
            'qualification' => 'required|string|max:255',
        ]);

        // Generate temporary password
        $tempPassword = Str::random(8);

        // Create the teacher
        try {
            $teacher = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'ic_number' => $request->ic_number,
                'phone' => $request->phone,
                'password' => Hash::make($tempPassword),
                'role' => 'teacher',
                'status' => 'active',
                'position' => $request->position,
                'qualification' => $request->qualification,
            ]);

            // Send email
            try {
                Mail::to($teacher->email)->send(new TeacherWelcomeMail($teacher, $tempPassword));
                return redirect()->route('admin.teachers.index')
                    ->with('success', '✅ Teacher created! Temporary password: ' . $tempPassword . ' (sent to email)');
            } catch (\Exception $e) {
                return redirect()->route('admin.teachers.index')
                    ->with('success', '⚠️ Teacher created but email failed. Temporary password: ' . $tempPassword);
            }

        } catch (\Exception $e) {
            return back()->with('error', 'Failed to create teacher: ' . $e->getMessage());
        }
    }

    public function destroy($id)
    {
        User::where('id', $id)->where('role', 'teacher')->delete();
        return back()->with('success', '✅ Teacher deleted successfully.');
    }
}