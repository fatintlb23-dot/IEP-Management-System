<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\Report;
use App\Models\Student;
use App\Models\IepGoal;
use App\Models\Progress;
use App\Models\StudentNote;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index()
    {
        $students = Student::where('teacher_id', auth()->id())->get();
        $reports = Report::where('teacher_id', auth()->id())->orderBy('created_at', 'desc')->get();
        return view('teacher.reports.index', compact('students', 'reports'));
    }

    public function generate(Request $request)
    {
        $request->validate([
            'student_id' => 'required',
            'report_type' => 'required',
        ]);

        $student = Student::findOrFail($request->student_id);
        
        // Set date range based on report type
        if ($request->report_type == 'Weekly') {
            $start = now()->subDays(7)->format('Y-m-d');
            $end = now()->format('Y-m-d');
        } else {
            $start = now()->subMonths(6)->format('Y-m-d');
            $end = now()->format('Y-m-d');
        }

        // Get goals for this student
        $goals = IepGoal::where('student_id', $student->student_id)->get();
        
        // Calculate overall progress
        $totalProgress = 0;
        $goalCount = $goals->count();

        foreach ($goals as $goal) {
            $latest = Progress::where('goal_id', $goal->goal_id)->latest()->first();
            $totalProgress += $latest ? $latest->progress_percentage : 0;
        }

        $overallProgress = $goalCount > 0 ? round($totalProgress / $goalCount, 2) : 0;

        // Get progress for each goal (latest only for display)
        $progress = Progress::whereIn('goal_id', $goals->pluck('goal_id'))
            ->orderBy('created_at', 'desc')
            ->get()
            ->groupBy('goal_id')
            ->map(function ($items) {
                return $items->first();
            });

        // ===== GET WEEKLY NOTES (FILTERED BY REPORT TYPE) =====
        // Get all notes for this student
        $allNotes = StudentNote::where('student_id', $student->student_id)
            ->orderBy('week_number', 'asc')
            ->get();

        // Filter notes based on report type
        if ($request->report_type == 'Weekly') {
            // Weekly: Only show notes from last 7 days
            $notes = $allNotes->filter(function ($note) {
                return $note->created_at->diffInDays(now()) <= 7;
            });
        } else {
            // 6-Month: Show all notes from last 6 months
            $notes = $allNotes->filter(function ($note) {
                return $note->created_at->diffInMonths(now()) <= 6;
            });
        }

        // Create report record
        $report = Report::create([
            'student_id' => $student->student_id,
            'teacher_id' => auth()->id(),
            'report_type' => $request->report_type,
            'report_period_start' => $start,
            'report_period_end' => $end,
            'report_overall_progress' => $overallProgress,
            'report_status' => 'pending',
        ]);

        return redirect()->route('teacher.reports.show', $report->report_id);
    }

    public function show($id)
    {
        $report = Report::findOrFail($id);
        $student = Student::findOrFail($report->student_id);
        $goals = IepGoal::where('student_id', $student->student_id)->get();
        
        // Get latest progress for each goal
        $progress = Progress::whereIn('goal_id', $goals->pluck('goal_id'))
            ->orderBy('created_at', 'desc')
            ->get()
            ->groupBy('goal_id')
            ->map(function ($items) {
                return $items->first();
            });

        // ===== GET WEEKLY NOTES (FILTERED BY REPORT TYPE) =====
        $allNotes = StudentNote::where('student_id', $student->student_id)
            ->orderBy('week_number', 'asc')
            ->get();

        // Filter notes based on report type
        if ($report->report_type == 'Weekly') {
            // Weekly: Only show notes from last 7 days
            $notes = $allNotes->filter(function ($note) {
                return $note->created_at->diffInDays(now()) <= 7;
            });
        } else {
            // 6-Month: Show all notes from last 6 months
            $notes = $allNotes->filter(function ($note) {
                return $note->created_at->diffInMonths(now()) <= 6;
            });
        }

        return view('teacher.reports.show', compact('report', 'student', 'goals', 'progress', 'notes'));
    }
}