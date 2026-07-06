<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IepGoal extends Model
{
    use HasFactory;

    protected $primaryKey = 'goal_id';
    protected $table = 'iep_goals';
    
    protected $fillable = [
        'student_id',
        'teacher_id',
        'goal_category',
        'goal_description',
        'goal_methods',
        'goal_target_date',
    ];

    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id', 'student_id');
    }

    public function teacher()
    {
        return $this->belongsTo(User::class, 'teacher_id', 'id');
    }
}