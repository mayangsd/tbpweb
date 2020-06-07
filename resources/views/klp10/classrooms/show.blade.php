@extends('layouts.admin')

@section('breadcrumb')
    {!! cui()->breadcrumb([
        'Home' => route('home'),
        'Daftar Kelas' => route('backend.classrooms.index'),
        'Lihat' => '#'
    ]) !!}
@endsection

@section('toolbar')
    @can('classrooms_manage')
        {!! cui()->toolbar_delete(route('backend.classrooms.destroy', [$classroom->id]), $classroom->id, 'cil-trash', 'Hapus', 'Anda yakin akan menghapus kelas ini?') !!}
        {!! cui()->toolbar_btn(route('backend.classrooms.edit', $classroom->id), 'cil-pencil', 'Edit') !!}
        {!! cui()->toolbar_btn(route('backend.classrooms.create'), 'cil-library-add', 'Tambah') !!}
    @endcan
    {!! cui()->toolbar_btn(route('backend.classrooms.index'), 'cil-list', 'List Kelas') !!}
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
