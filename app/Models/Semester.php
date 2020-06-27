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
        self::STATUS_SATU => 'Ganjil 2018/2019', 
        self::STATUS_DUA => 'Genap 2018/2019',
        self::STATUS_TIGA => 'Ganjil 2019/2020',
        self::STATUS_EMPAT => 'Genap 2019/2020',
        self::STATUS_LIMA => 'Ganjil 2020/2021',
        self::STATUS_ENAM => 'Genap 2020/2021',
        self::STATUS_TUJUH => 'Ganjil 2021/2022',
        self::STATUS_DELAPAN => 'Genap 2021/2022'
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
                return "Ganjil 2018/2019";
                break;
            case self::STATUS_DUA:
                return "Genap 2018/2019";
                break;
            case self::STATUS_TIGA:
                return "Ganjil 2019/2020";
                break;
            case self::STATUS_EMPAT:
                return "Genap 2019/2020";
                break;
            case self::STATUS_LIMA:
                return "Ganjil 2020/2021";
                break;
            case self::STATUS_ENAM:
                return "Genap 2020/2021";
                break;
            case self::STATUS_TUJUH:
                return "Ganjil 2021/2022";
                break;
            case self::STATUS_DELAPAN:
                return "Genap 2021/2022";
                break;
        }
    }
}
