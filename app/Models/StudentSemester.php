<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StudentSemester extends Model
{
    protected $guarded = [''];
    const validation_rules = [
        'name' => 'required',
        'id' => 'required',

    ];

    public function semesters()
    {
        return $this->belongsTo(Semester::class);
    }

    public function students()
    {
        return $this->belongsTo(Student::class, 'student_id', 'id');
    }
}
