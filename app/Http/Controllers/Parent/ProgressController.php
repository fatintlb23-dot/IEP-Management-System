<?php

namespace App\Http\Controllers\Parent;

use App\Http\Controllers\Controller;
use App\Models\Student;
use App\Models\IepGoal;
use App\Models\Progress;

class ProgressController extends Controller
{
    public function index()
    {
        $parent = auth()->user();
        $students = Student::where('parent_id', $parent->id)->get();
        $goals = IepGoal::whereIn('student_id', $students->pluck('student_id'))->get();
        $progress = Progress::whereIn('goal_id', $goals->pluck('goal_id'))
            ->orderBy('created_at', 'desc')
            ->get();
        
        return view('parent.progress', compact('students', 'goals', 'progress'));
    }
}