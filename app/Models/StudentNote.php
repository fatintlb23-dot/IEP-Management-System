<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentNote extends Model
{
    use HasFactory;

    protected $primaryKey = 'note_id';
    protected $table = 'student_notes';

    protected $fillable = [
        'student_id',
        'teacher_id',
        'week_number',
        'note_date',
        'note_content',
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