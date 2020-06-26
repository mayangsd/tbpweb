<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Classroom extends Model
{

    const STATUS_ACCEPTED = 0;
    const STATUS_REJECTED = 1;

    const validation_rules = [
        'name' => 'required',
       


    const STATUSES = [
        self::STATUS_ACCEPTED => 'TIDAK BATAL',
        self::STATUS_REJECTED => 'BATAL'
    ];

    public static $validation_rules = [
        'course_id' => 'required',
        'semester_id' => 'required',
        'name' => 'required',
        'min_students' => 'required',
        'max_students' => 'required',
        'cancelled' => 'required',
        'description' => 'required',
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

    public function getStatusTextAttribute($value){
        switch ($this->cancelled){
           
            case self::STATUS_ACCEPTED:
                return "<span class=\"badge badge-success\">TIDAK BATAL</span>";
                break;
            case self::STATUS_REJECTED:
                return "<span class=\"badge badge-danger\">BATAL</span>";
                break;
        }
}
}
