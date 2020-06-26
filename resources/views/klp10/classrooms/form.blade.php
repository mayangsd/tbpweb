<!-- Text Field Input for Nama Kelas -->

<div class="form-group">

<div class="form-group">
    <label class="form-label" for="semester_id">ID</label>
    {{ html()->text('id')->class(["form-control", "is-invalid" => $errors->has('id')])->id('id')->placeholder('Maksimal Students') }}
    @error('id')
    <div class="invalid-feedback">{{ $errors->first('id') }}</div>
    @enderror

    <label class="form-label" for="student_id">Nama Mahasiswa</label>
    {{ html()->select('student_id')->options($students)->class(["form-control", "is-invalid" => $errors->has('student_id')])->id('student_id')->placeholder('Pilih Id Mahasiswa') }}
    @error('student_id')
    <div class="invalid-feedback">{{ $errors->first('student_id') }}</div>
    @enderror
 
    <div class="form-group">
    <label class="form-label" for="semester_id">Semester</label>
    {{ html()->text('semester_id')->class(["form-control", "is-invalid" => $errors->has('semester_id')])->id('semester_id')->placeholder('Semester') }}
    @error('semester_id')
    <div class="invalid-feedback">{{ $errors->first('semester_id') }}</div>
    @enderror
    <div class="form-group">
    <label class="form-label" for="status">Status</label>
    {{ html()->text('status')->class(["form-control", "is-invalid" => $errors->has('status')])->id('status')->placeholder('Status') }}
    @error('status')
    <div class="invalid-feedback">{{ $errors->first('status') }}</div>
    @enderror
  

</div>