<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CourseSelection extends Model
{
    protected $guarded = [''];
    const validation_rules = [
        'name' => 'required',
        'id' => 'required',

    ];

    protected $guarded = [];

    public function student_semesters()
    {
        return $this->belongsTo(StudentSemester::class, 'student_semester_id', 'id');
    }

    public function classrooms()
    {
        return $this->hasMany(Classroom::class);
    }
}
