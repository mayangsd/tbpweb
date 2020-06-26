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
use PDF;

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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // $classroomEdit = Classroom::where('id', $id)->get();        
        // return view('klp10.classrooms.edit', compact('classroomEdit'));

        
        $classrooms = Classroom::find($id);
        $course = Course::all()->pluck('name','id');
        $semester = Semester::all()->pluck('period','id');
      
        return view('klp10.classrooms.edit', ['classrooms'=> $classrooms,'course' => $course,'semester'=> $semester]);
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
        $request->validate([
            'title' => 'required|unique:posts|max:255',
            'body' => 'required',
        ]);

        $classrooms = Classroom::find($id);
        if($classrooms->update($request->all())){
            notify('success', 'Berhasil mengubah data kelas');
        }else{
            notify('error', 'Gagal mengubah data Jurusan/Program Studi');
        }
        return redirect()->route('backend.classrooms.show', $classrooms->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Classroom $classroom)
    {
        if($classroom->delete())
        {
            notify('success', 'Berhasil menghapus data daftar kelas');
            return redirect()->route('backend.classrooms.index');
        }else{
            notify('error', 'Gagal menghapus data daftar kelas');
            return redirect()->back()->withErrors();
        }
    }

    public function print($id)
    {
        $classrooms = Classroom::find($id);
        $class_lecturers = ClassLecturer::with('lecturer')->where('classroom_id', $id)->get();
        $lecturer_in_classroom = (count($class_lecturers) == 0) ? null : $class_lecturers;
 
        $course_selection = CourseSelection::with('student_semesters.students')->where('classroom_id', $id)->get();
        $student_in_classroom = (count($course_selection) == 0) ? null : $course_selection;  
        $student_semesters = StudentSemester::with('students')->find($id);
        $semester = Semester::all()->pluck('period','id');

        $pdf = PDF::loadview('klp10.classrooms.print', ['classrooms'=>$classrooms, 'semester'=>$semester, 
                                'class_lecturers'=>$class_lecturers, 'student_in_classroom'=>$student_in_classroom, 
                                'lecturer_in_classroom'=>$lecturer_in_classroom]);
        return $pdf->stream();

    }
}
