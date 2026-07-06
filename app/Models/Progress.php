<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Progress extends Model  // ← Changed from IepProgress to Progress
{
    use HasFactory;

    protected $primaryKey = 'progress_id';
    protected $table = 'progress';  // ← Make sure this matches your table name
    
    protected $fillable = [
        'goal_id',
        'student_id',
        'teacher_id',
        'progress_percentage',
        'progress_notes',
        'progress_week',
    ];

    public function goal()
    {
        return $this->belongsTo(IepGoal::class, 'goal_id', 'goal_id');
    }

    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id', 'student_id');
    }

    public function teacher()
    {
        return $this->belongsTo(User::class, 'teacher_id', 'id');
    }
}