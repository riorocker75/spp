@extends('layouts.app')
@section('body')
<div class="card">
    <div class="card-header">{{ $title }}</div>
    <form action="{{ $action }}" method="post">
        @csrf
        @method($method)
        <div class="card-body">
            <div class="mb-3">
                <label for="input_name">Nama</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="input_name" value="{{ old('name') ?? $data->name }}" name="name">
                @error('name')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="input_wali_name">Nama Wali</label>
                <input type="text" class="form-control @error('wali_name') is-invalid @enderror" id="input_wali_name" value="{{ old('wali_name') ?? $data->wali_name }}" name="wali_name">
                @error('wali_name')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="card-footer d-flex"><button class="btn btn-primary ml-auto">{{ $submit }}</button></div>
    </form>
</div>
@endsection