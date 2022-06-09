@extends('layouts.app')
@section('body')
<div class="card">
    <div class="card-header">
        <div class="d-flex justify-content-between">
            Data Siswa
            <form class="d-flex align-items-end" style="gap:1rem">
                <div>
                    <label for="filter_master_class"><small>Kelas</small></label>
                    <select onchange="this.form.submit()" name="master_class" id="filter_master_class" class="form-control form-control-sm">
                        <option value="">Semua Kelas</option>
                        @foreach ($master_classes as $item)
                        <option value="{{ $item->id }}" {{ $item->id == request('master_class') ? 'selected' : '' }}>{{ $item->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label for="filter_year"><small>Tahun ajaran</small></label>
                    <select onchange="this.form.submit()" name="school_year" id="filter_year" class="form-control form-control-sm">
                        <option value="">Semua tahun ajaran</option>
                        @foreach ($schoolYears as $item)
                        <option value="{{ $item->school_year }}" {{ $item->school_year == request('school_year') ? 'selected' : '' }}>{{ $item->school_year }}</option>
                        @endforeach
                    </select>
                </div>
                <a href="{{ route('students.create') }}" class="btn btn-primary btn-sm">Tambah</a>
            </form>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-sm">
                <thead>
                    <tr>
                        <th>NIS</th>
                        <th>NISN</th>
                        <th>NAMA</th>
                        <th>JK</th>
                        <th>AGAMA</th>
                        <th>NO.HP</th>
                        <th>Kelas</th>
                        <th>Wali Kelas</th>
                        <th>T/A</th>
                        <th>#</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $item)
                    <tr>
                        <td>{{ $item->nis }}</td>
                        <td>{{ $item->nisn }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->gender }}</td>
                        <td>{{ $item->religion }}</td>
                        <td>{{ $item->phone }}</td>
                        <td>{{ optional($item->masterClass)->name }}</td>
                        <td>{{ optional($item->masterClass)->wali_name }}</td>
                        <td>{{ $item->school_year }}</td>
                        <td>
                            <div class="d-flex" style="gap:1rem">
                                <a href="{{ route('students.edit', $item) }}" class="btn btn-secondary btn-sm">Edit</a>
                                <button class="btn btn-danger btn-sm" onclick="confirm('Apakah anda yakin ingin menghapus data ini?') ? document.getElementById('form_delete_student_{{ $item->id }}').submit() : ''">Hapus</button>
                                <form id="form_delete_student_{{ $item->id }}" action="{{ route('students.destroy', $item) }}" method="post">
                                    @csrf
                                    @method('delete')
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        {{ $data->links() }}
    </div>
</div>
@endsection