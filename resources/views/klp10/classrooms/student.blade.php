@extends('layouts.admin')

@section('breadcrumb')
    {!! cui()->breadcrumb([
        'Home' => route('home'),
        'Daftar Kelas' => route('backend.classrooms.index'),
        'Detail Kelas' => route('backend.classrooms.show', [$classrooms->id]),

        'Lihat' => '#'
    ]) !!}
@endsection


@section('content')

    {{ html()->form('POST', route('backend.classrooms.students.store',[$classrooms->id]))->open() }}

    <div class="row justify-content-center">
        <div class="col">
            <div class="card">

                {{ html()->modelForm($students) }}

                {{-- CARD HEADER--}}
                <div class="card-header">
                    <strong><i class="cil-zoom"></i> Tambah Mahasiswa {{ $classrooms->name }}</strong>
                </div>

                {{-- CARD BODY--}}
                <div class="card-body">  
                    <div class="form-group">
                        <label class="form-label" for="student_id">Nama Mahasiswa</label>
                        {{ html()->select('student_id')->options($students)->class(["form-control", "is-invalid" => $errors->has('student_id')])->id('student_id')->placeholder('Pilih Mahasiswa') }}
                        @error('student_id')
                        <div class="invalid-feedback">{{ $errors->first('student_id') }}</div>
                        @enderror
                     </div>
                </div>

                {{--CARD FOOTER--}}
                <div class="card-footer">
                    <input type="submit" value="Simpan" class="btn btn-primary"/>
                 </div>

                {{ html()->form()->close() }}
            </div>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col">
            <div class="card">
                {{-- CARD HEADER--}}
                <div class="card-header">
                    <strong><i class="cil-zoom"></i> Daftar Mahasiswa Pada Kelas {{ $classrooms->name }}</strong>
                </div>

                {{-- CARD BODY--}}
                <div class="card-body">  
                    <table class="table table-outline table-hover">
                        <thead class="thead-light">
                             <tr>
                                <th>Nama Mahasiswa</th>
                                <th>NIM</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                        @forelse($course_selection as $course_selections)
                        <tr>
                            <td>{{ $course_selections->student_semesters->students->name }}</td>
                            <td>{{ $course_selections->student_semesters->students->nim }}</td>
                            <td>{!! cui()->btn_delete(route('backend.classrooms.students.destroy', [$classrooms->id, $course_selections->id]), "Anda yakin akan menghapus data mahasiswa ini?") !!}</td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5">Belum ada Mahasiswa</td>
                        </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
    

