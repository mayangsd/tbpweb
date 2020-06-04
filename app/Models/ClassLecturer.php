<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ClassLecturer extends Model
{
    
    const validation_rules = [
        'name' => 'required',

    ];

    public function classrooms()
    {
        return $this->hasMany(Classroom::class);
    }

    public function lecturer()
    {
        return $this->belongsTo(Lecturer::class);
    }
}
