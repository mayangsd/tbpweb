<?php

namespace App\Http\Controllers\Backend\Academic;

use App\Http\Controllers\Controller;

use App\Http\Controllers\Backend\Academic\ClassroomStudentController;
use App\Models\Classroom;
use App\Models\Course;
use App\Models\Semester;
use App\Models\ClassLecturer;
use App\Models\CourseSelection;
use App\Models\StudentSemester;
use App\Models\Student;
use App\Models\Lecturer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClassroomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $classrooms = Classroom::select('classrooms.*','semesters.period')
        ->join ('semesters','classrooms.semester_id','=','semesters.id')
        ->get();
        return view('klp10.classrooms.index', compact('classrooms')); 
        

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $classrooms = Classroom::all()->pluck('name', 'id');
        $course = Course::all()->pluck('name','id');
        $semester = Semester::all()->pluck('id');
        $period=Semester::semester;
        $cancelled=Classroom::STATUSES;
      
        return view('klp10.classrooms.create', compact('classrooms','course','semester','period','cancelled'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, Classroom::$validation_rules);
        if(Classroom::create($request->all())){
            notify('success', 'Berhasil menambahkan data kelas');
        }else{
            notify('error', 'Gagal menambahkan data kelas');
        }
        return redirect()->route('backend.classrooms.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)

    {
        //
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
