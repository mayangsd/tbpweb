<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Classroom extends Model
{
    const validation_rules = [
        'name' => 'required',
       
        


    ];

    protected $table = 'classrooms';

    protected $guarded = [];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function semester()
    {
        return $this->belongsTo(Semester::class);
    }

    public function class_lecturers()
    {
        return $this->hasOne(ClassLecturer::class);
    }

    public function student_semesters()
    {
        return $this->hasOne(StudentSemester::class);
    }

    public function course_selections()
    {
        return $this->hasOne(CourseSelection::class);
    }
}
