<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\Student;
use App\Models\IepGoal;
use App\Models\Progress;
use Illuminate\Http\Request;

class ProgressController extends Controller
{
    public function index(Request $request)
    {
        $students = Student::where('teacher_id', auth()->id())->get();
        
        // Build query for goals with filters
        $goalsQuery = IepGoal::whereIn('student_id', $students->pluck('student_id'));
        
        // Filter by category
        if ($request->has('category') && $request->category) {
            $goalsQuery->where('goal_category', ucfirst($request->category));
        }
        
        $goals = $goalsQuery->get();
        
        // Get all progress for these goals
        $progressQuery = Progress::whereIn('goal_id', $goals->pluck('goal_id'));
        
        // Filter by status (using latest progress percentage)
        if ($request->has('status') && $request->status) {
            $allProgress = $progressQuery->get();
            $filteredGoalIds = [];
            
            foreach ($goals as $goal) {
                $latest = $allProgress->where('goal_id', $goal->goal_id)->sortByDesc('created_at')->first();
                if ($latest) {
                    $percent = $latest->progress_percentage;
                    $status = $this->getStatus($percent);
                    if ($status == $request->status) {
                        $filteredGoalIds[] = $goal->goal_id;
                    }
                } elseif ($request->status == 'not-started') {
                    $filteredGoalIds[] = $goal->goal_id;
                }
            }
            
            $goals = $goals->filter(function($goal) use ($filteredGoalIds) {
                return in_array($goal->goal_id, $filteredGoalIds);
            });
        }
        
        // Get all progress (for display)
        $progress = Progress::whereIn('goal_id', $goals->pluck('goal_id'))
            ->orderBy('created_at', 'desc')
            ->get();
        
        return view('teacher.progress.index', compact('students', 'goals', 'progress'));
    }

    private function getStatus($percentage)
    {
        if ($percentage >= 100) return 'completed';
        if ($percentage >= 70) return 'on-track';
        if ($percentage >= 30) return 'in-progress';
        return 'not-started';
    }

    public function create($goal_id)
    {
        $goal = IepGoal::findOrFail($goal_id);
        return view('teacher.progress.create', compact('goal'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'goal_id' => 'required|exists:iep_goals,goal_id',
            'progress_week' => 'required|integer|min:1',
            'progress_percentage' => 'required|integer|min:0|max:100',
            'progress_notes' => 'nullable|string|max:500',
        ]);

        $goal = IepGoal::findOrFail($request->goal_id);

        // Check if progress already exists for this week
        $existing = Progress::where('goal_id', $request->goal_id)
            ->where('progress_week', $request->progress_week)
            ->first();

        if ($existing) {
            return redirect()->back()
                ->with('error', 'Week ' . $request->progress_week . ' already has progress recorded.');
        }

        Progress::create([
            'goal_id' => $request->goal_id,
            'student_id' => $goal->student_id,
            'teacher_id' => auth()->id(),
            'progress_week' => $request->progress_week,
            'progress_percentage' => $request->progress_percentage,
            'progress_notes' => $request->progress_notes,
        ]);

        return redirect()->route('teacher.progress.index')
            ->with('success', 'Progress updated successfully!');
    }

    public function destroy($id)
    {
        try {
            $progress = Progress::findOrFail($id);
            
            if ($progress->teacher_id !== auth()->id()) {
                return redirect()->route('teacher.progress.index')
                    ->with('error', 'Unauthorized to delete this progress.');
            }
            
            $progress->delete();
            
            return redirect()->route('teacher.progress.index')
                ->with('success', 'Progress entry deleted successfully!');
        } catch (\Exception $e) {
            return redirect()->route('teacher.progress.index')
                ->with('error', 'Failed to delete progress entry.');
        }
    }
}