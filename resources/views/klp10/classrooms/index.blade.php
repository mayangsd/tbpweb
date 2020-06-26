@extends('layouts.admin')

@section('breadcrumb')
    {!! cui()->breadcrumb([
        'Home' => route('home'),
        'Daftar Kelas' => route('backend.classrooms.index'),
        'Index' => '#'
    ]) !!}
@endsection

@section('toolbar')
    {!! cui()->toolbar_btn(route('backend.classrooms.create'), 'cil-playlist-add', 'Tambah Kelas') !!}
    
    
@endsection

@section('content')

    <div class="card">

        <div class="card-header">
            <strong>List Daftar Kelas</strong>
        </div>

        <div class="card-body">
            <table class="table table-outline table-hover">
                <thead class="thead-light">
                <tr>
                    <th>nama kelas</th>
                    <th>minimal mahasiswa</th>
                    <th>maksimal mahasiswa </th>
                    <th>semester</th>
                    <th>Batal</th>
                    <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                @forelse($classrooms as $classroom)
                    <tr>
                        <td>{{ $classroom->name }}</td>
                        <td>
                            {{ $classroom->min_students }}    
                        </td>
                        <td>
                          {{$classroom->max_students}}
                        </td>
                        <td>
                          {{$classroom->period}}
                        <td>
                          {!!$classroom->status_text!!}
                        </td>
                       
                        <td>
                            {!! cui()->btn_view(route('backend.classrooms.show', [$classroom->id])) !!}
                            {!! cui()->btn_edit(route('backend.classrooms.edit', [$classroom->id])) !!}
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5">Belum ada proposal</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>

        <div class="card-footer">

        </div>

    </div>

@endsection
