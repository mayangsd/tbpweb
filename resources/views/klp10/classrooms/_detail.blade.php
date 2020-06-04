
<!-- Static Field for Nama -->
<div class="form-group">
    <div class='form-label'>Nama Kelas</div>
    <div>{{ $classrooms->name }}</div>
</div>

<!-- Static Field for Singkatan -->
<div class="form-group">
    <div class='form-label'>Minimal Mahasiswa</div>
    <div>{{ $classrooms->min_students }}</div>
</div>

<!-- Static Field for Singkatan -->
<div class="form-group">
    <div class='form-label'>Maksimal Mahasiswa</div>
    <div>{{ $classrooms->max_students }}</div>
</div>

<!-- Static Field for Fakultas -->
<div class="form-group">
    <div class='form-label'>Matkul</div>
    <div>{{ optional($classrooms->course)->name }}</div>
</div>

<!-- Static Field for Fakultas -->
<div class="form-group">
    <div class='form-label'>Semester</div>
    <div>{{ optional($classrooms->semester)->period }}</div>
</div>

<!-- Static Field for Kode Nasional -->
<div class="form-group">
    <div class='form-label'>Dosen Pengampu</div>
    @if($lecturer_in_classroom) 
    <ul>
        @foreach($lecturer_in_classroom as $lecturer_class)
        <li>

            {{$lecturer_class->lecturer->name}}
</li>
        @endforeach
        </ul
    @else
    {{'belum ada Dosen di kelas ini'}}
    @endif
</div>
    

<!-- Static Field for Kode Nasional -->
<div class="form-group">
    <div class='form-label'>Mahasiswa</div>
    @if($student_in_classroom) 
    <ul>
        @foreach($student_in_classroom as $student_class)
        <li>

            {{$student_class->student_semesters->students->name}}
</li>
        @endforeach
        </ul
    @else
    {{'belum ada mahasiswa yang mengambil kelas ini'}}
    @endif
</div>

<!-- Static Field for Kode Nasional -->
<div class="form-group">
    <div class='form-label'>Pembatalan Kelas</div>
    <div>{{ $classrooms->cancelled }}</div>
</div>

<!-- Static Field for Kode Nasional -->
<div class="form-group">
    <div class='form-label'>Deskripsi Kelas</div>
    <div>{{ $classrooms->description}}</div>
</div>

