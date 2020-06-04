<?php

namespace App\Http\Controllers\Backend\Academic;

use App\Http\Controllers\Controller;
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
        $classrooms = DB::table('classrooms')
        ->select('classrooms.*')
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
        $semester = Semester::all()->pluck('period','id');
      
        return view('klp10.classrooms.create', compact('classrooms','course','semester'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
     
      
       
        
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
        $classrooms = Classroom::find($id);
        $class_lecturers = ClassLecturer::with('lecturer')->where('classroom_id', $id)->get();
        $lecturer_in_classroom = (count($class_lecturers) == 0) ? null : $class_lecturers;
 
        $course_selection = CourseSelection::with('student_semesters.students')->where('classroom_id', $id)->get();
        $student_in_classroom = (count($course_selection) == 0) ? null : $course_selection;  
        $student_semesters = StudentSemester::with('students')->find($id);
        $semester = Semester::all()->pluck('period','id');

            return view('klp10.classrooms.show', compact('classrooms','course','semester', 'class_lecturers', 'student_in_classroom','lecturer_in_classroom'));
        
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
