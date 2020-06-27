
<table class="{{ config('style.table') }}">
    <!-- Static Field for Nama -->
    <tr>
        <td class='form-label'>Nama Kelas</td>
        <td>{{$classrooms->name}}</td>
    </tr>

    <!-- Static Field for Course -->
    <tr>   
        <td class='form-label'>Mata Kuliah</td>
        <td>{{ optional($classrooms->course)->name }}</td>                   
    </tr>

<!-- Static Field for Nama -->
<div class="form-group">
    <div class='form-label'>Nama Kelas</div>
    <div>{{ $classrooms->name }}</div>
</div>


    <!-- Static Field for Credit -->
    <tr>
        <td class='form-label'>Jumlah SKS</td>
        <td>{{ optional($classrooms->course)->credit }}</td>
    </tr>

    <!-- Static Field For Semester -->
    <tr>
        <td class='form-label'>Semester</td>
        <td> {{ optional($classrooms->semester)->status_text }}</td> 
    </tr>

    <!-- Static Field for Minimum Student -->
    <tr>
        <td class='form-label'>Minimum Student</td>
        <td>{{ $classrooms->min_students }}</td>
    </tr>

    <!-- Static Field for Maximum Student -->
    <tr>
        <td class='form-label'>Maximum Student</td>
        <td>{{ $classrooms->max_students }}</td>
    </tr>

    <!-- Static Field for Total Student in Class -->
    <tr>
        <td class='form-label'>Jumlah Mahasiswa</td>
        <td>{{ $count }}</td>
    </tr>

    <!-- Static Field for Class Description -->
    <tr>
        <td class='form-label'>Class Description</td>
        <td>{{ optional($classrooms)->description }}</td>
    </tr>

    <!-- Static Field for Cancelled -->
    <tr>
        <td class='form-label'>Cancelled</td>
        <td>{!!$classrooms->status_text!!}</td>
    </tr>
</table>

<!-- Static Field for Lecturer -->
<div class="form-group">
    <div class='form-label'>Dosen</div>
    @if($lecturer_in_classroom)
        <table class="{{ config('style.table') }}">
            <thead class="{{ config('style.thead') }}">
                <tr>
                    <th>NIK</th>
                    <th>Name</th>
                </tr>
            </thead>
            <tbody>
            @foreach($lecturer_in_classroom as $lecturer_class)
                <tr>   
                    <td>{{$lecturer_class->lecturer->nik}}</td>
                    <td>{{$lecturer_class->lecturer->name}}</td>                   
                </tr>
            @endforeach
            </tbody>
        </table>
    @else
        {{'belum ada dosen yang terdaftar pada kelas ini'}}
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


</td>
<td>


</td>
</tr>
</tbody>
</table>

</div>



    
</div>

