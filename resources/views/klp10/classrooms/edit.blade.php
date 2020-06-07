@extends('layouts.admin')

@section('breadcrumb')
    {!! cui()->breadcrumb([
        'Home' => route('home'),
        'Daftar Kelas' => route('backend.classrooms.index'),
        'Edit' => '#'
    ]) !!}
@endsection

@section('toolbar')
    @can('classrooms_manage')
        {!! cui()->toolbar_btn(route('backend.classrooms.create'), 'cil-library-add', 'Tambah') !!}
    @endcan
    {!! cui()->toolbar_btn(route('backend.classrooms.index'), 'cil-pencil', 'List Kelas') !!}
@endsection

@section('content')
    <div class="row justify-content-center">
        <div class="col">
            <div class="row">
                <div class="col-md-8">
                    <div class="card">

                    {{ html()->modelForm($classrooms, 'PUT', route('backend.classrooms.update', $classrooms->id))->open() }}
                        
                        {{--CARD HEADER --}}
                        <div class="card-header">
                            <strong><i class="cil-pencil"></i> Edit Kelas </strong>
                        </div>

                        {{-- CARD BODY--}}
                        <div class="card-body">
                            @include('klp10.classrooms._form')
                            @error('title')
                                <div class="alert alert-danger">{{ 'Masih ada kolom yang kosong' }}</div>
                            @enderror
                        </div>

                        {{-- CARD FOOTER--}}
                        <div class="card-footer">
                            <input type="submit" class="btn btn-primary" value="Simpan"/>
                        </div>
                       
                       
                    </div>
                </div>

            </div>

        </div>
    </div>
@endsection
