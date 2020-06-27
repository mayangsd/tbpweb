<!-- Input (Select) MataKuliah -->
<div class="form-group">
    <label class="form-label" for="course_id">Matkul</label>
    {{ html()->select('course_id')->options($course)->class(["form-control", "is-invalid" => $errors->has('course_id')])->id('course_id') }}
    @error('course_id')
    <div class="invalid-feedback">{{ $errors->first('course_id') }}</div>
    @enderror
</div>

<!-- Input (Select) Semester -->
<div class="form-group">
    <label class="form-label" for="semester_id">Semester</label>

    {{ html()->select('semester_id')->options($period)->class(["form-control", "is-invalid" => $errors->has('semester_id')])->id('semester_id')->placeholder('Pilih Semester') }}

    @error('semester_id')
    <div class="invalid-feedback">{{ $errors->first('semester_id') }}</div>
    @enderror
</div>


<!-- Text Field Input for Nama Kelas -->
<div class="form-group">
    <label class="form-label" for="name">Nama Kelas</label>
    {{ html()->text('name')->class(["form-control", "is-invalid" => $errors->has('name')])->id('name')->placeholder('Nama Kelas') }}
    @error('name')
    <div class="invalid-feedback">{{ $errors->first('name') }}</div>
    @enderror
</div>

<!-- Text Field Input for minimal students -->
<div class="form-group">
    <label class="form-label" for="min_students">Minimal Mahasiswa</label>
    {{ html()->text('min_students')->class(["form-control", "is-invalid" => $errors->has('min_students')])->id('min_students')->placeholder('Minimal Students') }}
    @error('min_students')
    <div class="invalid-feedback">{{ $errors->first('min_students') }}</div>
    @enderror
</div>

<!-- Text Field Input for maks students -->
<div class="form-group">
    <label class="form-label" for="max_students">Maksimal Mahasiswa</label>
    {{ html()->text('max_students')->class(["form-control", "is-invalid" => $errors->has('max_students')])->id('max_students')->placeholder('Maksimal Students') }}
    @error('max_students')
    <div class="invalid-feedback">{{ $errors->first('max_students') }}</div>
    @enderror
</div>


<!-- Input (Select) Semester -->
<div class="form-group">
    <label class="form-label" for="cancelled">Batal</label>
    {{ html()->select('cancelled')->options($cancelled)->class(["form-control", "is-invalid" => $errors->has('cancelled')])->id('cancelled')->placeholder('Pilih Batal') }}
    @error('cancelled')
    <div class="invalid-feedback">{{ $errors->first('cancelled') }}</div>
    @enderror
</div>

<!-- Text Field Input for Keterangan Kelas -->
<div class="form-group">
    <label class="form-label" for="description">Keterangan Kelas</label>
    {{ html()->textarea('description')->class(["form-control", "is-invalid" => $errors->has('description')])->id('description')->placeholder('Deskripsi Singkat tentang Kelas') }}
    @error('description')
    <div class="invalid-feedback">{{ $errors->first('description') }}</div>
    @enderror
</div>

