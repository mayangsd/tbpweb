@extends('layouts.admin')

@section('breadcrumb')
    {!! cui()->breadcrumb([
        'Home' => route('home'),
        'Daftar Kelas' => route('backend.classrooms.index'),
        'Index' => '#'
    ]) !!}
@endsection

@section('toolbar')
    {!! cui()->toolbar_btn(route('backend.classrooms.index'), 'cil-list', 'List Daftar Kelas') !!}
@endsection

@section('content')

    {{ html()->form('POST', route('backend.classrooms.store'))->open() }}

    <div class="card">
        <div class="card-header">
            <strong> <i class="cil-plus"></i> Tambah Kelas</strong>
        </div>

        <div class="card-body">

            @include('klp10.classrooms._form')

        </div>

        <div class="card-footer">
            <input type="submit" class="btn btn-primary" value="Simpan" />
        </div>
    </div>

    {{ html()->form()->close() }}

@endsection
