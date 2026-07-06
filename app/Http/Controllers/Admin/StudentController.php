<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Student;
use App\Models\User;
use App\Models\IepGoal;
use App\Models\Progress;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index(Request $request)
    {
        $query = Student::with(['teacher', 'parent']);
        
        if ($request->has('search') && $request->search) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('student_name', 'like', "%{$search}%")
                  ->orWhere('student_ic', 'like', "%{$search}%")
                  ->orWhere('student_diagnosis', 'like', "%{$search}%");
            });
        }
        
        if ($request->has('teacher_id') && $request->teacher_id) {
            $query->where('teacher_id', $request->teacher_id);
        }
        
        $students = $query->paginate(10);
        $teachers = User::where('role', 'teacher')->get();
        
        return view('admin.students.index', compact('students', 'teachers'));
    }

    public function show($id)
    {
        $student = Student::with(['teacher', 'parent'])->findOrFail($id);
        $goals = IepGoal::where('student_id', $student->student_id)->get();
        $progress = Progress::where('student_id', $student->student_id)
            ->orderBy('created_at', 'desc')
            ->get();

        return view('admin.students.show', compact('student', 'goals', 'progress'));
    }
}