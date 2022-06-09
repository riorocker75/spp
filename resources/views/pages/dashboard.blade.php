@extends('layouts.app')
@section('body')
<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header bg-info text-white">Data Siswa</div>
            <div class="card-body d-flex justify-content-center align-items-center">
                <h1 class="mb-0 font-weight-bold">{{ $studentCount }}</h1>
            </div>
            <div class="rounded-bottom btn btn-success">Selengkapnya</div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card">
            <div class="card-header bg-info text-white">Data Kelas</div>
            <div class="card-body d-flex justify-content-center align-items-center">
                <h1 class="mb-0 font-weight-bold">{{ $masterClassCount }}</h1>
            </div>
            <div class="rounded-bottom btn btn-success">Selengkapnya</div>
        </div>
    </div>
</div>
@endsection