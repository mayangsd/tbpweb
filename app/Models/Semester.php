<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Semester extends Model
{
    const STATUS_SATU = 1;
    const STATUS_DUA = 2;
    const STATUS_TIGA = 3;
    const STATUS_EMPAT = 4;
    const STATUS_LIMA = 5;
    const STATUS_ENAM = 6;
    const STATUS_TUJUH = 7;
    const STATUS_DELAPAN = 8;

    const semester = [
        self::STATUS_SATU => 'SEMESTER 1 GANJIL', 
        self::STATUS_DUA => 'SEMESTER 2 GENAP',
        self::STATUS_TIGA => 'SEMESTER 3 GANJIL',
        self::STATUS_EMPAT => 'SEMESTER 4 GENAP',
        self::STATUS_LIMA => 'SEMESTER 5 GANJIL',
        self::STATUS_ENAM => 'SEMESTER 6 GENAP',
        self::STATUS_TUJUH => 'SEMESTER 7 GANJIL',
        self::STATUS_DELAPAN => 'SEMESTER 8 GENAP'
    ];

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

    public function getStatusTextAttribute($value){
        switch ($this->period){
           
            case self::STATUS_SATU:
                return "SEMESTER 1 GANJIL";
                break;
            case self::STATUS_DUA:
                return "SEMESTER 2 GENAP";
                break;
            case self::STATUS_TIGA:
                return "SEMESTER 3 GANJIL";
                break;
            case self::STATUS_EMPAT:
                return "SEMESTER 4 GENAP";
                break;
            case self::STATUS_LIMA:
                return "SEMESTER 5 GANJIL";
                break;
            case self::STATUS_ENAM:
                return "SEMESTER 6 GENAP";
                break;
            case self::STATUS_TUJUH:
                return "SEMESTER 7 GANJIL";
                break;
            case self::STATUS_DELAPAN:
                return "SEMESTER 8 GENAP";
                break;
        }
        }
        }
        
        
        
        

