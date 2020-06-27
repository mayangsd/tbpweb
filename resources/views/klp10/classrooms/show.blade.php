@extends('layouts.admin')

@section('breadcrumb')
    {!! cui()->breadcrumb([
        'Home' => route('home'),
        'Daftar Kelas' => route('backend.classrooms.index'),
        'Detail' => '#'
    ]) !!}
@endsection

@section('toolbar')

   {!! cui()->toolbar_btn(route('backend.classrooms.students.create', [$classrooms->id]), 'cil-library-add', 'Tambah/Hapus Mahasiswa') !!}

   {!! cui()->toolbar_btn(route('backend.classrooms.print', [$classrooms->id]), 'cil-print', 'Print') !!}

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
                <div class="card-footer"></div>

                {{ html()->closeModelForm() }}

            </div>
        </div>

    </div>

@endsection