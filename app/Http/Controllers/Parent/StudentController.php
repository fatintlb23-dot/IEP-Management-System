<?php

namespace App\Http\Controllers\Parent;

use App\Http\Controllers\Controller;
use App\Models\Student;

class StudentController extends Controller
{
    public function index()
    {
        $parent = auth()->user();
        $students = Student::where('parent_id', $parent->id)->get();
        return view('parent.child-profile', compact('students'));
    }
}