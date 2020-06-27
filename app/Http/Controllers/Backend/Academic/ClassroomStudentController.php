<?php

namespace App\Http\Controllers\Backend\Academic;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Classroom;
use App\Models\Course;
use App\Models\Semester;
use App\Models\ClassLecturer;
use App\Models\CourseSelection;
use App\Models\StudentSemester;
use App\Models\Student;
use App\Models\Lecturer;

class ClassroomStudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {

        $classrooms = Classroom::find($id);
        $course_selection = CourseSelection::with('student_semesters.students')->where('classroom_id', $id)->get();
        $student_in_classroom = (count($course_selection) == 0) ? null : $course_selection;  
        $student_semesters = StudentSemester::with('students')->find($id);
        $students = Student::all()->pluck('name','id');
        
        return view('klp10.classrooms.student', compact('classrooms', 'course_selection', 'student_in_classroom', 'student_semesters', 'students'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        $classrooms = Classroom::find($id);
        if(StudentSemester::create($request->all())){
            notify('success', 'Berhasil menambahkan data Mahasiswa');
        }else{
            notify('error', 'Gagal menambahkan data Mahasiswa');
        }
        $classrooms = Classroom::find($id);
        $class_lecturers = ClassLecturer::with('lecturer')->where('classroom_id', $id)->get();
        $lecturer_in_classroom = (count($class_lecturers) == 0) ? null : $class_lecturers;
 
        $course_selection = CourseSelection::with('student_semesters.students')->where('classroom_id', $id)->get();
        $student_in_classroom = (count($course_selection) == 0) ? null : $course_selection;  
        $student_semesters = StudentSemester::with('students')->find($id);
        $semester = Semester::all()->pluck('period','id');

        return view('klp10.classrooms.show', compact('classrooms','semester', 'class_lecturers', 'student_in_classroom','lecturer_in_classroom'));
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
    public function destroy($classroom_id, $id)
    {
        $classrooms = CourseSelection::find($id);
        $course_selection = CourseSelection::where('id', $id)->delete();
        if($course_selection)
        { 
            notify('success', 'Berhasil menghapus data');
            return redirect()->route('backend.classrooms.students.create',[$classrooms->classroom_id]);
        }
        else{
            notify('error', 'Gagal menghapus data');
            return redirect()->route('backend.classrooms.students.create',[$classrooms->classroom_id]);
        }
    
        
    }
}
