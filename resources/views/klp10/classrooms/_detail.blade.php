<table class="table table-outline table-hover">
<thead class="thead-light">
    <tr>
        <th>Nama Kelas</th>
        <th>Minimal Mahasiswa</th>
        <th>Maksimal Mahasiswa</th>
        <th>Matkul</th>
        <th>Semester</th>
        <th>Dosen Pengampu</th>
        <th>Mahasiswa</th>
        <th>Batal</th>
    </tr>
</thead>
<tbody>
    <tr>

   
<td>
  {{ $classrooms->name }}
</div>
</td>

<td>
{{ $classrooms->min_students }}

</td>
<td>
   {{ $classrooms->max_students }}
</td>

<td>
{{ optional($classrooms->course)->name }}

</td>
<td>
{{ optional($classrooms->semester)->period }}
</td>
<td>
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
</td>
<td>
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
</td>
<td>
{!!$classrooms->status_text!!}

</td>
</tr>
</tbody>
</table>