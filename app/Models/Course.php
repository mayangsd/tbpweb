<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    const validation_rules = [
        'name' => 'required',

    ];

    public function classrooms()
    {
        return $this->hasMany(Classroom::class);
    }
}
