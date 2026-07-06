<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Student;
use App\Models\User;
use App\Models\IepGoal;
use App\Models\Progress;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index()
    {
        $teachers = User::where('role', 'teacher')->get();
        return view('admin.reports.index', compact('teachers'));
    }

    public function generate(Request $request)
    {
        $request->validate([
            'teacher_id' => 'required',
            'report_type' => 'required|in:Weekly,6-Month',
        ]);

        $teacherId = $request->teacher_id;
        $reportType = $request->report_type;

        // Determine teacher name and get students
        if ($teacherId === 'all') {
            $teacherName = 'All Teachers';
            $students = Student::with('teacher')->get();
        } else {
            $teacher = User::findOrFail($teacherId);
            $teacherName = $teacher->name;
            $students = Student::where('teacher_id', $teacherId)->with('teacher')->get();
        }

        // Set date range based on report type
        if ($reportType === 'Weekly') {
            $start = now()->subDays(7)->startOfDay();
            $end = now()->endOfDay();
        } else { // 6-Month
            $start = now()->subMonths(6)->startOfDay();
            $end = now()->endOfDay();
        }

        $data = [];
        foreach ($students as $student) {
            $goals = IepGoal::where('student_id', $student->student_id)->get();
            $totalProgress = 0;
            $goalCount = $goals->count();

            foreach ($goals as $goal) {
                $latestProgress = Progress::where('goal_id', $goal->goal_id)
                    ->whereBetween('created_at', [$start, $end])
                    ->latest()
                    ->first();
                $totalProgress += $latestProgress ? $latestProgress->progress_percentage : 0;
            }

            $avgProgress = $goalCount > 0 ? round($totalProgress / $goalCount, 2) : 0;

            $data[] = [
                'student' => $student,
                'goals' => $goalCount,
                'avg_progress' => $avgProgress,
            ];
        }

        // Calculate students above 75% and below 50%
        $studentsAbove75 = 0;
        $studentsBelow50 = 0;
        foreach ($data as $row) {
            if ($row['avg_progress'] >= 75) {
                $studentsAbove75++;
            } elseif ($row['avg_progress'] < 50) {
                $studentsBelow50++;
            }
        }

        return view('admin.reports.show', compact(
            'data', 
            'reportType', 
            'teacherName', 
            'start', 
            'end',
            'studentsAbove75',
            'studentsBelow50'
        ));
    }
}