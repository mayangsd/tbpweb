@extends('layouts.admin')

@section('breadcrumb')
    {!! cui()->breadcrumb([
        'Home' => route('home'),
        'Daftar Kelas' => route('backend.classrooms.index'),
        'Lihat' => '#'
    ]) !!}
@endsection

@section('toolbar')
    <!-- @can('classrooms_manage')
        {!! cui()->toolbar_delete(route('backend.classrooms.students.destroy', [$classrooms->id]), $classrooms->id, 'cil-trash', 'Hapus', 'Anda yakin akan menghapus Prodi ini?') !!}
        {!! cui()->toolbar_btn(route('backend.classrooms.students.create'), 'cil-library-add', 'Tambah') !!}
    @endcan -->
   {!! cui()->toolbar_btn(route('backend.classrooms.students.create', [$classrooms->id]), 'cil-library-add', 'Tambah Mahasiswa') !!}
@endsection

@section('content')
    <div class="row justify-content-center">
        <div class="col">
            <div class="card">

                {{ html()->modelForm($classrooms) }}

                {{-- CARD HEADER--}}
                <div class="card-header">
                    <strong><i class="cil-zoom"></i> Detail Kelas</strong>
                </div>

                {{-- CARD BODY--}}
                <div class="card-body">
                  
                       
                    @include('klp10.classrooms._detail')
                
                </div>

                {{--CARD FOOTER--}}
                <div class="card-footer">
                </div>

                {{ html()->closeModelForm() }}

            </div>
        </div>

    </div>

@endsection