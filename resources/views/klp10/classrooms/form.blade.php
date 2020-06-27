<div class="form-group">
    
    <label class="form-label" for="student_id">Nama Mahasiswa</label>
    {{ html()->select('student_id')->options($students)->class(["form-control", "is-invalid" => $errors->has('student_id')])->id('student_id')->placeholder('Pilih Id Mahasiswa') }}
    @error('student_id')
    <div class="invalid-feedback">{{ $errors->first('student_id') }}</div>
    @enderror


</div>