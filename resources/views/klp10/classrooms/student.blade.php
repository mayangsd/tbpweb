@extends('layouts.admin')

@section('breadcrumb')
    {!! cui()->breadcrumb([
        'Home' => route('home'),
        'Daftar Kelas' => route('backend.classrooms.index'),
        'Detail Kelas' => route('backend.classrooms.show', [$classrooms->id]),
        'Edit' => '#'
    ]) !!}
@endsection

@section('content')
<div class="row justify-content-center">
    <div class="col">
        <div class="row">
            <div class="col-md-9">
                <div class="card">
                {{ html()->form('POST', route('backend.classrooms.students.store', [$classrooms->id]))->open() }}
                    {{-- CARD HEADER--}}
                    {{ html()->modelForm($classrooms) }}
                    <div class="card-header">
                        <strong><i class="cil-zoom"></i> Add Student in {{ $classrooms->name }} </strong>
                    </div>

                    {{-- CARD BODY--}}
                    <div class="card-body">
                        <!-- List of student that can be add into classroom -->
                        <div class="form-group">
                            <label class="form-label" for="name">List Mahasiswa yang bisa ditambahkan {{ $classrooms->name }}</label>
                            @if($student_add)
                            <table class="{{ config('style.table') }}">
                                <thead class="{{ config('style.thead') }}">
                                    <tr>
                                        <th>NIM</th>
                                        <th>Name</th>
                                        <th>Pilih</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($student_add as $tambah)
                                    <tr>   
                                        <td>{{ $tambah->students->nim }}</td>
                                        <td>{{ $tambah->students->name }}</td>
                                        <td>
                                            <input type="submit" class="btn btn-primary" value="Tambah" />
                                        </td>                   
                                    </tr>
                                     @endforeach
                                </tbody>
                            </table>
                        @else
                            {{'belum ada mahasiswa yang mengambil kelas ini'}}
                        @endif
                        </div>
                    </div>
                    {{ html()->closeModelForm() }}
                </div>
                {{ html()->form()->close() }}
                <div class="card">
                {{ html()->modelForm($classrooms) }}
                {{-- CARD HEADER--}}
                <div class="card-header">
                    <strong><i class="cil-zoom"></i>Mahasiswa yang terdaftar di {{ $classrooms->name }}</strong>
                </div>
                {{-- CARD BODY--}}
                <div class="card-body">
                    <!-- Static Field for Student in Class -->
                    <div class="form-group">
                        <div class='form-label'>Mahasiswa</div>
                        @if($student_in_classroom)
                            <table class="{{ config('style.table') }}">
                                <thead class="{{ config('style.thead') }}">
                                    <tr>
                                        <th>NIM</th>
                                        <th>Name</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($student_in_classroom as $student_class)
                                    <tr>   
                                        <td>{{ $student_class->student_semesters->students->nim }}</td>
                                        <td>{{ $student_class->student_semesters->students->name }}</td>
                                        <td class="text-center">
                                           
                                        </td>                   
                                    </tr>
                                     @endforeach
                                </tbody>
                            </table>
                        @else
                            {{'belum ada mahasiswa yang mengambil kelas ini'}}
                        @endif
                    </div>
                </div>
                {{ html()->closeModelForm() }}
                {{--CARD FOOTER--}}
                <div class="card-footer"></div>
            </div>
            </div>
        </div>
    </div>         
</div>
@endsection