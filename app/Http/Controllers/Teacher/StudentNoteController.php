<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\StudentNote;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentNoteController extends Controller
{
    public function store(Request $request, $studentId)
    {
        $request->validate([
            'note_content' => 'required|string|max:1000',
            'week_number' => 'required|integer|min:1',
            'note_date' => 'required|date',
        ]);

        $student = Student::where('teacher_id', auth()->id())->findOrFail($studentId);

        StudentNote::create([
            'student_id' => $studentId,
            'teacher_id' => auth()->id(),
            'week_number' => $request->week_number,
            'note_date' => $request->note_date,
            'note_content' => $request->note_content,
        ]);

        return redirect()->route('teacher.students.show', $studentId)
            ->with('success', 'Note added successfully!');
    }

    public function destroy($id)
    {
        $note = StudentNote::findOrFail($id);
        
        if ($note->teacher_id !== auth()->id()) {
            return redirect()->back()->with('error', 'Unauthorized action.');
        }

        $studentId = $note->student_id;
        $note->delete();

        return redirect()->route('teacher.students.show', $studentId)
            ->with('success', 'Note deleted successfully!');
    }
}