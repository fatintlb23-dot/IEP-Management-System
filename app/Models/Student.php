<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $primaryKey = 'student_id';

    protected $fillable = [
        'teacher_id',
        'parent_id',
        'student_name',
        'student_ic',
        'student_dob',
        'student_age',
        'student_diagnosis',
        'student_strengths',
        'student_weaknesses',
    ];

    public function teacher()
    {
        return $this->belongsTo(User::class, 'teacher_id');
    }

    public function parent()
    {
        return $this->belongsTo(User::class, 'parent_id');
    }

    public function notes()
    {
        return $this->hasMany(StudentNote::class, 'student_id', 'student_id');
    }
}