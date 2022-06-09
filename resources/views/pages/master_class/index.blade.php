@extends('layouts.app')
@section('body')
<div class="card">
    <div class="card-header">
        <div class="d-flex justify-content-between">
            {{ $title }}
            <a href="{{ route('master_classes.create') }}" class="btn btn-primary">Tambah</a>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>Nama Kelas</th>
                        <th>Nama Wali Kelas</th>
                        <th>#</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $item)
                    <tr>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->wali_name }}</td>
                        <td>
                            <div class="d-flex" style="gap:1rem">
                                <a href="{{ route('master_classes.edit', $item) }}" class="btn btn-sm btn-secondary">Edit</a>
                                <button class="btn btn-sm btn-danger" onclick="confirm('Apakah anda yakin ingin menghapus data ini?') ? document.getElementById('form_delete_{{ $item->id }}').submit() : ''">Hapus</button>
                                <form id="form_delete_{{ $item->id }}" action="{{ route('master_classes.destroy', $item) }}" method="post">
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