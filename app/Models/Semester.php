<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Semester extends Model
{
    const validation_rules = [
        'period' => 'required',
        

    ];

    public function classrooms()
    {
        return $this->hasOne(Classroom::class);
    }

    public function student_semesters()
    {
        return $this->hasOne(StudentSemester::class);
    }
}
