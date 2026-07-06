<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;

class IepController extends Controller
{
    public function index(Request $request)
    {
        $query = Student::with(['teacher', 'parent']);
        
        if ($request->has('search') && $request->search) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('student_name', 'like', "%{$search}%")
                  ->orWhere('student_ic', 'like', "%{$search}%");
            });
        }
        
        if ($request->has('teacher_id') && $request->teacher_id) {
            $query->where('teacher_id', $request->teacher_id);
        }
        
        $students = $query->paginate(10);
        $teachers = User::where('role', 'teacher')->get();
        
        return view('admin.ieps.index', compact('students', 'teachers'));
    }
}