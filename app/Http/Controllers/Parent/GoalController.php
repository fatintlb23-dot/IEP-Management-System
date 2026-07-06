<?php

namespace App\Http\Controllers\Parent;

use App\Http\Controllers\Controller;
use App\Models\Student;
use App\Models\IepGoal;

class GoalController extends Controller
{
    public function index()
    {
        $parent = auth()->user();
        
        // Find students linked to this parent
        $students = Student::where('parent_id', $parent->id)->get();
        
        // Get all goals for these students
        $goals = IepGoal::whereIn('student_id', $students->pluck('student_id'))->get();
        
        return view('parent.goals', compact('students', 'goals'));
    }
}