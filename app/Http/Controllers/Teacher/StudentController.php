<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\Student;
use App\Models\User;
use App\Models\IepGoal;
use App\Models\Progress;
use App\Models\StudentNote;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the teacher's students.
     */
    public function index()
    {
        $students = Student::where('teacher_id', auth()->id())->paginate(10);
        return view('teacher.students.index', compact('students'));
    }

    /**
     * Show the form for creating a new student.
     */
    public function create()
    {
        $parents = User::where('role', 'parent')->where('status', 'active')->get();
        return view('teacher.students.create', compact('parents'));
    }

    /**
     * Store a newly created student in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'student_name' => 'required|string|max:255',
            'student_ic' => 'required|string|unique:students,student_ic|max:20',
            'student_dob' => 'required|date',
            'student_diagnosis' => 'required|string|max:100',
            'student_strengths' => 'nullable|string',
            'student_weaknesses' => 'nullable|string',
            'parent_id' => 'nullable|exists:users,id',
        ]);

        // Calculate age
        $dob = new \DateTime($request->student_dob);
        $now = new \DateTime();
        $age = $dob->diff($now)->y;

        $student = Student::create([
            'teacher_id' => auth()->id(),
            'parent_id' => $request->parent_id,
            'student_name' => $request->student_name,
            'student_ic' => $request->student_ic,
            'student_dob' => $request->student_dob,
            'student_age' => $age,
            'student_diagnosis' => $request->student_diagnosis,
            'student_strengths' => $request->student_strengths,
            'student_weaknesses' => $request->student_weaknesses,
        ]);

        return redirect()->route('teacher.students.index')
            ->with('success', 'Student added successfully!');
    }

    /**
     * Display the specified student.
     */
    public function show($id)
    {
        $student = Student::where('teacher_id', auth()->id())
            ->with(['teacher', 'parent'])
            ->findOrFail($id);
        
        // Get all notes for this student
        $notes = StudentNote::where('student_id', $id)
            ->where('teacher_id', auth()->id())
            ->orderBy('week_number', 'desc')
            ->get();
        
        return view('teacher.students.show', compact('student', 'notes'));
    }

    /**
     * Show the form for editing the specified student.
     */
    public function edit($id)
    {
        $student = Student::where('teacher_id', auth()->id())->findOrFail($id);
        $parents = User::where('role', 'parent')->where('status', 'active')->get();
        return view('teacher.students.edit', compact('student', 'parents'));
    }

    /**
     * Update the specified student in storage.
     */
    public function update(Request $request, $id)
    {
        $student = Student::where('teacher_id', auth()->id())->findOrFail($id);

        $request->validate([
            'student_name' => 'required|string|max:255',
            'student_ic' => 'required|string|max:20|unique:students,student_ic,' . $student->student_id . ',student_id',
            'student_dob' => 'required|date',
            'student_diagnosis' => 'required|string|max:100',
            'student_strengths' => 'nullable|string',
            'student_weaknesses' => 'nullable|string',
            'parent_id' => 'nullable|exists:users,id',
        ]);

        // Calculate age
        $dob = new \DateTime($request->student_dob);
        $now = new \DateTime();
        $age = $dob->diff($now)->y;

        $student->update([
            'student_name' => $request->student_name,
            'student_ic' => $request->student_ic,
            'student_dob' => $request->student_dob,
            'student_age' => $age,
            'student_diagnosis' => $request->student_diagnosis,
            'student_strengths' => $request->student_strengths,
            'student_weaknesses' => $request->student_weaknesses,
            'parent_id' => $request->parent_id,
        ]);

        return redirect()->route('teacher.students.show', $student->student_id)
            ->with('success', 'Student updated successfully!');
    }

    /**
     * Remove the specified student from storage.
     */
    public function destroy($id)
    {
        $student = Student::where('teacher_id', auth()->id())->findOrFail($id);
        
        // Delete related goals and progress first
        $goals = IepGoal::where('student_id', $student->student_id)->get();
        foreach ($goals as $goal) {
            Progress::where('goal_id', $goal->goal_id)->delete();
            $goal->delete();
        }
        
        $student->delete();

        return redirect()->route('teacher.students.index')
            ->with('success', 'Student deleted successfully!');
    }
}