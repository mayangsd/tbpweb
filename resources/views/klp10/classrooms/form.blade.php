<!-- Text Field Input for Nama Kelas -->

<div class="form-group">
    
    <label class="form-label" for="student_semester_id">Nama Mahasiswa</label>
    {{ html()->select('student_semester_id')->options($students)->class(["form-control", "is-invalid" => $errors->has('student_semester_id')])->id('student_semester_id')->placeholder('Nama Mahasiswa') }}
    @error('student_semester_id')
    <div class="invalid-feedback">{{ $errors->first('student_semester_id') }}</div>
    @enderror

    <!-- <label class="form-label" for="classroom_id">Classroom</label>
    {{ html()->select('classroom_id')->options($classrooms)->class(["form-control", "is-invalid" => $errors->has('classroom_id')])->id('classroom_id')->placeholder('Classroom') }}
    @error('classroom_id')
    <div class="invalid-feedback">{{ $errors->first('classroom_id') }}</div>
    @enderror -->

</div>
