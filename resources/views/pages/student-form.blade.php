@extends('layouts.app')
@section('body')
<div class="row">
    <div class="col-md-6">
        <form action="{{ $action }}" method="post">
            <div class="card">
                <div class="card-header">{{ $title }}</div>
                @csrf
                @method($method)
                <div class="card-body">
                    <div class="mb-3">
                        <label for="input_nis">NIS <span class="text-info">(Username)</span></label>
                        <input type="text" class="form-control @error('nis') is-invalid @enderror" id="input_nis" value="{{ old('nis') ?? $data->nis }}" name="nis">
                        @error('nis')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="input_nisn">NISN</label>
                        <input type="text" class="form-control @error('nisn') is-invalid @enderror" id="input_nisn" value="{{ old('nisn') ?? $data->nisn }}" name="nisn">
                        @error('nisn')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="input_name">Nama</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="input_name" value="{{ old('name') ?? $data->name }}" name="name">
                        @error('name')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="input_gender">Jenis kelamin</label>
                        <select class="form-control @error('gender') is-invalid @enderror" id="input_gender" value="{{ old('gender') ?? $data->gender }}" name="gender">
                            <option value="">Pilih Jenis Kelamin</option>
                            <option value="male" {{ (old('gender') ?? $data->gender) == 'male' ? 'selected' : '' }}>Laki-laki</option>
                            <option value="female" {{ (old('gender') ?? $data->gender) == 'female' ? 'selected' : '' }}>Perempuan</option>
                        </select>
                        @error('gender')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="input_religion">Agama</label>
                        <select class="form-control @error('religion') is-invalid @enderror" id="input_religion" value="{{ old('religion') ?? $data->religion }}" name="religion">
                            <option value="">Pilih Agama</option>
                            <option value="islam" {{ (old('religion') ?? $data->religion) == 'islam' ? 'selected' : '' }}>Islam</option>
                            <option value="protestan" {{ (old('religion') ?? $data->religion) == 'protestan' ? 'selected' : '' }}>Protestan</option>
                            <option value="katolik" {{ (old('religion') ?? $data->religion) == 'katolik' ? 'selected' : '' }}>Katolik</option>
                            <option value="hindu" {{ (old('religion') ?? $data->religion) == 'hindu' ? 'selected' : '' }}>Hindu</option>
                            <option value="budha" {{ (old('religion') ?? $data->religion) == 'budha' ? 'selected' : '' }}>Budha</option>
                            <option value="konghutchu" {{ (old('religion') ?? $data->religion) == 'konghutchu' ? 'selected' : '' }}>Konghutchu</option>
                        </select>
                        @error('religion')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="input_phone">Telepon</label>
                        <input type="text" class="form-control @error('phone') is-invalid @enderror" id="input_phone" value="{{ old('phone') ?? $data->phone }}" name="phone">
                        @error('phone')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="input_master_class_id">Kelas</label>
                        <select class="form-control @error('master_class_id') is-invalid @enderror" id="input_master_class_id" value="{{ old('master_class_id') ?? $data->master_class_id }}" name="master_class_id">
                            <option value="">Pilih Kelas</option>
                            @foreach ($master_classes as $item)
                            <option value="{{ $item->id }}" {{ (old('master_class_id') ?? $data->master_class_id) == $item->id ? 'selected' : '' }}>{{ $item->name }}</option>
                            @endforeach
                        </select>
                        @error('master_class_id')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="input_school_year">Tahun Ajaran</label>
                        <input type="number" class="form-control @error('school_year') is-invalid @enderror" id="input_school_year" value="{{ old('school_year') ?? $data->school_year ?? now()->format('Y') }}" name="school_year">
                        @error('school_year')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="card-footer">
                    <div class="d-flex justify-content-end">
                        <button class="btn btn-primary">{{ $submit }}</button>
                    </div>
                </div>
            </div>
        </form>

    </div>
    @if($data->exists)
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">Data Login <span class="text-warning">(Update Password)</span></div>
            <form action="{{ route('students.update-password', $data) }}" method="post">
                @csrf
                @method('put')
                <div class="card-body">
                    <div class="mb-3">
                        <label for="input_password">Password</label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror" id="input_password" value="{{ old('password') ?? $data->password }}" name="password">
                        @error('password')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="input_password_confirmation">Konfirmasi Password</label>
                        <input type="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror" id="input_password_confirmation" value="{{ old('password_confirmation') ?? $data->password }}" name="password_confirmation">
                        @error('password_confirmation')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="card-footer d-flex">
                    <button type="submit" class="ml-auto btn btn-primary">Update Password</button>
                </div>
            </form>
        </div>
    </div>
    @endif
</div>
@endsection