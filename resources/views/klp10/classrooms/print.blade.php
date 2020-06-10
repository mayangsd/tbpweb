@extends('layouts.blank')

@section('content')
    {{ html()->modelForm($classrooms) }}
    <div class="card">
        <div class="card-body">
         <!-- Static Field for Nama -->
        <div class="form-group">
            <div class='form-label'>Nama Kelas</div>
            <div>{{ $classrooms->name }}</div>            
        </div>    

        <!-- Static Field for Minimum Student -->
        <div class="form-group">
            <div class='form-label'>Minimal Mahasiswa</div>
            <div>{{ $classrooms->min_students }}</div>
        </div>            

        <!-- Static Field for Maxiumum Student -->
        <div class="form-group">
            <div class='form-label'>Maksimal Mahasiswa</div>
            <div>{{ $classrooms->max_students }}</div>
        </div>            

        <!-- Static Field for Course -->
        <div class="form-group">
            <div class='form-label'>Matkul</div>
            <div>{{ optional($classrooms->course)->name }}</div>
        </div>

        <!-- Static Field for Semester-->
        <div class="form-group">
            <div class='form-label'>Semester</div>
            <div>{{ optional($classrooms->semester)->period }}</div>
        </div>

        <!-- Static Field for Canceled Class -->
        <div class="form-group">
            <div class='form-label'>Pembatalan Kelas</div>
            <div>{{ $classrooms->cancelled }}</div>
        </div>

        <!-- Static Field for Class Description -->
        <div class="form-group">
            <div class='form-label'>Deskripsi Kelas</div>
            <div>{{ $classrooms->description}}</div>
        </div>

        <!-- Static Field for Lecturer -->
        <div class="form-group">
            <div class='form-label'>Dosen Pengampu</div>
            @if($lecturer_in_classroom) 
                <ul>
                    @foreach($lecturer_in_classroom as $lecturer_class)
                        <li> {{$lecturer_class->lecturer->name}}</li>
                    @endforeach
                </ul>
            @else
                {{'belum ada Dosen di kelas ini'}}
            @endif
        </div>            

        <!-- Static Field for Student in Class -->
        <div class="form-group">
            <div class='form-label'>Mahasiswa</div>
            @if($student_in_classroom)
                <table class="{{ config('style.table') }}">
                <thead class="{{ config('style.thead') }}">
                    <tr>
                        <th>NIM</th>
                        <th>Name</th>
                    </tr>
                </thead>
                
                <tbody>
                    @foreach($student_in_classroom as $student_class)
                        <tr>   
                            <td>{{ $student_class->student_semesters->students->nim }}</td>
                            <td>{{ $student_class->student_semesters->students->name }}</td>                   
                        </tr>
                    @endforeach
                </tbody>
                </table>
            @else
                {{'belum ada mahasiswa yang mengambil kelas ini'}}
            @endif
        </div>

@endsection