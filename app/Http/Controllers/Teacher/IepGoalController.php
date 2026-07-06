<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\Student;
use App\Models\IepGoal;
use Illuminate\Http\Request;

class IepGoalController extends Controller
{
    public function index()
    {
        $students = Student::where('teacher_id', auth()->id())->get();
        return view('teacher.goals.index', compact('students'));
    }

    public function create()
    {
        $students = Student::where('teacher_id', auth()->id())->get();
        return view('teacher.goals.create', compact('students'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'student_id' => 'required|exists:students,student_id',
            'goal_category' => 'required',
            'goal_description' => 'required',
            'goal_methods' => 'required',
            'goal_target_date' => 'required|date',
        ]);

        $student = Student::findOrFail($request->student_id);
        if ($student->teacher_id !== auth()->id()) {
            return back()->with('error', 'Unauthorized student.');
        }

        IepGoal::create([
            'student_id' => $request->student_id,
            'teacher_id' => auth()->id(),
            'goal_category' => $request->goal_category,
            'goal_description' => $request->goal_description,
            'goal_methods' => $request->goal_methods,
            'goal_target_date' => $request->goal_target_date,
        ]);

        return redirect()->route('teacher.goals.index')
            ->with('success', 'IEP Goal created successfully!');
    }

    public function destroy($id)
    {
        try {
            $goal = IepGoal::findOrFail($id);
            
            $student = Student::findOrFail($goal->student_id);
            if ($student->teacher_id !== auth()->id()) {
                return redirect()->route('teacher.goals.index')
                    ->with('error', 'Unauthorized to delete this goal.');
            }
            
            $goal->delete();
            
            return redirect()->route('teacher.goals.index')
                ->with('success', 'Goal deleted successfully!');
        } catch (\Exception $e) {
            return redirect()->route('teacher.goals.index')
                ->with('error', 'Failed to delete goal.');
        }
    }
}