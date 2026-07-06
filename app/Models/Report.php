<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    protected $primaryKey = 'report_id';

    protected $fillable = [
        'student_id',
        'teacher_id',
        'report_type',
        'report_period_start',
        'report_period_end',
        'report_overall_progress',
        'report_status',
        'approved_by',
    ];

    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id', 'student_id');
    }

    public function teacher()
    {
        return $this->belongsTo(User::class, 'teacher_id');
    }
}