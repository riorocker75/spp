@extends('layouts.app')
@section('body')
<div class="card">
    <div class="card-header">
        <div class="d-flex justify-content-between align-items-center">
            <h4 class="mb-0 ml-2"><strong>Data Siswa</strong></h4>
            <form class="d-flex align-items-end" style="gap:1rem">
                <div>
                    <label for="filter_nis"><small>NIS</small></label>
                    <div class="input-group">
                        <input type="text" name="nis" value="{{ request('nis') }}" id="filter_nis" class="form-control form-control-sm" />
                        <div class="input-group-append">
                            <button class="btn btn-secondary btn-sm"><i class="fas fa-search"></i></button>
                        </div>
                    </div>
                </div>
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
                <div>
                    <label for="per_page"><small>Per Hal</small></label>
                    <select onchange="this.form.submit()" name="perpage" id="per_page" class="form-control form-control-sm">
                        <option value="all" {{ request('perpage') == 'all' ? 'selected' : '' }}>Semua</option>
                        <option value="10" {{ request('perpage') == '10' ? 'selected' : '' }}>10</option>
                        <option value="25" {{ request('perpage') == '25' ? 'selected' : '' }}>25</option>
                        <option value="100" {{ request('perpage') == '100' ? 'selected' : '' }}>100</option>
                    </select>
                </div>
                <div>
                    <div>
                        <label for="print_button"><small>Print</small></label>
                    </div>
                    <button onclick="printTable()" class="btn btn-success btn-sm" type="button" role="button" id="print_button"><i class="fas fa-print"></i></button>
                </div>
            </form>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive" id="tableBill">
            <h1 class="text-center mb-3 d-none d-print-block">Tagihan SPP Siswa</h1>
            <table class="table table-bordered table-sm">
                <thead>
                    <tr>
                        <th>NIS</th>
                        <th>NAMA</th>
                        <th>JULI</th>
                        <th>AGUSTUS</th>
                        <th>SEPTEMBER</th>
                        <th>OKTOBER</th>
                        <th>NOVEMBER</th>
                        <th>DESEMBER</th>
                        <th>JANUARI</th>
                        <th>FEBRUARI</th>
                        <th>MARET</th>
                        <th>APRIL</th>
                        <th>MEI</th>
                        <th class="d-print-none">#</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $i => $item)
                    <tr>
                        <td class="text-nowrap">{{ $item->nis }}</td>
                        <td class="text-nowrap">{{ $item->name }}</td>
                        @foreach($item->bills as $bill)
                        <td class="text-nowrap">{{ $bill->status }}</td>
                        @endforeach
                        <td class="d-print-none">
                            <button type="button" role="button" data-toggle="modal" data-target="#modalDetailSiswa{{ $i }}" class="btn btn-info btn-sm btn-circle"><i class="fas fa-eye"></i></button>
                            <div class="modal fade" id="modalDetailSiswa{{ $i }}" tabindex="-1" role="dialog" aria-labelledby="modalDetailSiswa{{ $i }}Label" aria-hidden="true">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="modalDetailSiswa{{ $i }}Label">Detail Siswa</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form action="{{ route('bills.update', $item) }}" method="post" enctype="multipart/form-data">
                                            @csrf
                                            @method('put')
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-md-6 mb-2 mb-md-0">
                                                        <div class="list-group">
                                                            <div class="list-group-item d-flex ">
                                                                <div class="mr-auto font-weight-bold">NIS</div>{{ $item->nis }}
                                                            </div>
                                                            <div class="list-group-item d-flex ">
                                                                <div class="mr-auto font-weight-bold">NISN</div>{{ $item->nisn }}
                                                            </div>
                                                            <div class="list-group-item d-flex ">
                                                                <div class="mr-auto font-weight-bold">NAMA</div>{{ $item->name }}
                                                            </div>
                                                            <div class="list-group-item d-flex ">
                                                                <div class="mr-auto font-weight-bold">JENIS KELAMIN</div>{{ $item->gender == 'male' ? 'Laki-laki' : 'Perempuan' }}
                                                            </div>
                                                            <div class="list-group-item d-flex text-capitalize">
                                                                <div class="mr-auto font-weight-bold">AGAMA</div>{{ $item->religion }}
                                                            </div>
                                                            <div class="list-group-item d-flex ">
                                                                <div class="mr-auto font-weight-bold">TELEPON</div>{{ $item->phone }}
                                                            </div>
                                                            <div class="list-group-item d-flex ">
                                                                <div class="mr-auto font-weight-bold">TAHUN AJARAN</div>{{ $item->school_year }}
                                                            </div>
                                                            <div class="list-group-item d-flex ">
                                                                <div class="mr-auto font-weight-bold">KELAS</div>{{ $item->masterClass->name }}
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 mb-2 mb-md-0">
                                                        <div class="list-group">
                                                            <div class="list-group-item d-flex align-items-center">
                                                                <div class="mr-auto font-weight-bold">JULI</div>
                                                                <div class="d-flex align-items-center">
                                                                    <div>
                                                                        <div> {{$item->bills[0]->status}} </div>
                                                                        <small id="status_bukti_{{ $i }}_0" class="text-muted">{{ $item->bills[0]->attachment }}</small>
                                                                    </div>
                                                                    <label for="input_bukti_{{ $i }}_0" class="btn btn-primary text-nowrap mb-0 ml-3"><i class="fas fa-upload"></i></label>
                                                                    <input type="file" accept="image/*" name="bukti_7" id="input_bukti_{{ $i }}_0" class="sr-only">
                                                                    <script>
                                                                        document.getElementById('input_bukti_{{ $i }}_0').addEventListener('change', e => {
                                                                            document.querySelector('#status_bukti_{{ $i }}_0').innerText=e.target.files[0].name
                                                                        })
                                                                    </script>
                                                                </div>
                                                            </div>
                                                            <div class="list-group-item d-flex align-items-center">
                                                                <div class="mr-auto font-weight-bold">AGUSTUS</div>
                                                                <div class="d-flex align-items-center">
                                                                    <div>
                                                                        <div> {{$item->bills[1]->status}} </div>
                                                                        <small id="status_bukti_{{ $i }}_1" class="text-muted">{{ $item->bills[1]->attachment }}</small>
                                                                    </div>
                                                                    <label for="input_bukti_{{ $i }}_1" class="btn btn-primary text-nowrap mb-0 ml-3"><i class="fas fa-upload"></i></label>
                                                                    <input type="file" accept="image/*" name="bukti_8" id="input_bukti_{{ $i }}_1" class="sr-only">
                                                                    <script>
                                                                        document.getElementById('input_bukti_{{ $i }}_1').addEventListener('change', e => {
                                                                            document.querySelector('#status_bukti_{{ $i }}_1').innerText=e.target.files[0].name
                                                                        })
                                                                    </script>
                                                                </div>
                                                            </div>
                                                            <div class="list-group-item d-flex align-items-center">
                                                                <div class="mr-auto font-weight-bold">SEPTEMBER</div>
                                                                <div class="d-flex align-items-center">
                                                                    <div>
                                                                        <div> {{$item->bills[2]->status}} </div>
                                                                        <small id="status_bukti_{{ $i }}_2" class="text-muted">{{ $item->bills[2]->attachment }}</small>
                                                                    </div>
                                                                    <label for="input_bukti_{{ $i }}_2" class="btn btn-primary text-nowrap mb-0 ml-3"><i class="fas fa-upload"></i></label>
                                                                    <input type="file" accept="image/*" name="bukti_9" id="input_bukti_{{ $i }}_2" class="sr-only">
                                                                    <script>
                                                                        document.getElementById('input_bukti_{{ $i }}_2').addEventListener('change', e => {
                                                                            document.querySelector('#status_bukti_{{ $i }}_2').innerText=e.target.files[0].name
                                                                        })
                                                                    </script>
                                                                </div>
                                                            </div>
                                                            <div class="list-group-item d-flex align-items-center">
                                                                <div class="mr-auto font-weight-bold">OKTOBER</div>
                                                                <div class="d-flex align-items-center">
                                                                    <div>
                                                                        <div> {{$item->bills[3]->status}} </div>
                                                                        <small id="status_bukti_{{ $i }}_3" class="text-muted">{{ $item->bills[3]->attachment }}</small>
                                                                    </div>
                                                                    <label for="input_bukti_{{ $i }}_3" class="btn btn-primary text-nowrap mb-0 ml-3"><i class="fas fa-upload"></i></label>
                                                                    <input type="file" accept="image/*" name="bukti_10" id="input_bukti_{{ $i }}_3" class="sr-only">
                                                                    <script>
                                                                        document.getElementById('input_bukti_{{ $i }}_3').addEventListener('change', e => {
                                                                            document.querySelector('#status_bukti_{{ $i }}_3').innerText=e.target.files[0].name
                                                                        })
                                                                    </script>
                                                                </div>
                                                            </div>
                                                            <div class="list-group-item d-flex align-items-center">
                                                                <div class="mr-auto font-weight-bold">NOVEMBER</div>
                                                                <div class="d-flex align-items-center">
                                                                    <div>
                                                                        <div> {{$item->bills[4]->status}} </div>
                                                                        <small id="status_bukti_{{ $i }}_4" class="text-muted">{{ $item->bills[4]->attachment }}</small>
                                                                    </div>
                                                                    <label for="input_bukti_{{ $i }}_4" class="btn btn-primary text-nowrap mb-0 ml-3"><i class="fas fa-upload"></i></label>
                                                                    <input type="file" accept="image/*" name="bukti_11" id="input_bukti_{{ $i }}_4" class="sr-only">
                                                                    <script>
                                                                        document.getElementById('input_bukti_{{ $i }}_4').addEventListener('change', e => {
                                                                            document.querySelector('#status_bukti_{{ $i }}_4').innerText=e.target.files[0].name
                                                                        })
                                                                    </script>
                                                                </div>
                                                            </div>
                                                            <div class="list-group-item d-flex align-items-center">
                                                                <div class="mr-auto font-weight-bold">DESEMBER</div>
                                                                <div class="d-flex align-items-center">
                                                                    <div>
                                                                        <div> {{$item->bills[5]->status}} </div>
                                                                        <small id="status_bukti_{{ $i }}_5" class="text-muted">{{ $item->bills[5]->attachment }}</small>
                                                                    </div>
                                                                    <label for="input_bukti_{{ $i }}_5" class="btn btn-primary text-nowrap mb-0 ml-3"><i class="fas fa-upload"></i></label>
                                                                    <input type="file" accept="image/*" name="bukti_12" id="input_bukti_{{ $i }}_5" class="sr-only">
                                                                    <script>
                                                                        document.getElementById('input_bukti_{{ $i }}_5').addEventListener('change', e => {
                                                                            document.querySelector('#status_bukti_{{ $i }}_5').innerText=e.target.files[0].name
                                                                        })
                                                                    </script>
                                                                </div>
                                                            </div>
                                                            <div class="list-group-item d-flex align-items-center">
                                                                <div class="mr-auto font-weight-bold">JANUARI</div>
                                                                <div class="d-flex align-items-center">
                                                                    <div>
                                                                        <div> {{$item->bills[6]->status}} </div>
                                                                        <small id="status_bukti_{{ $i }}_6" class="text-muted">{{ $item->bills[6]->attachment }}</small>
                                                                    </div>
                                                                    <label for="input_bukti_{{ $i }}_6" class="btn btn-primary text-nowrap mb-0 ml-3"><i class="fas fa-upload"></i></label>
                                                                    <input type="file" accept="image/*" name="bukti_1" id="input_bukti_{{ $i }}_6" class="sr-only">
                                                                    <script>
                                                                        document.getElementById('input_bukti_{{ $i }}_6').addEventListener('change', e => {
                                                                            document.querySelector('#status_bukti_{{ $i }}_6').innerText=e.target.files[0].name
                                                                        })
                                                                    </script>
                                                                </div>
                                                            </div>
                                                            <div class="list-group-item d-flex align-items-center">
                                                                <div class="mr-auto font-weight-bold">FEBRUARI</div>
                                                                <div class="d-flex align-items-center">
                                                                    <div>
                                                                        <div> {{$item->bills[7]->status}} </div>
                                                                        <small id="status_bukti_{{ $i }}_7" class="text-muted">{{ $item->bills[7]->attachment }}</small>
                                                                    </div>
                                                                    <label for="input_bukti_{{ $i }}_7" class="btn btn-primary text-nowrap mb-0 ml-3"><i class="fas fa-upload"></i></label>
                                                                    <input type="file" accept="image/*" name="bukti_2" id="input_bukti_{{ $i }}_7" class="sr-only">
                                                                    <script>
                                                                        document.getElementById('input_bukti_{{ $i }}_7').addEventListener('change', e => {
                                                                            document.querySelector('#status_bukti_{{ $i }}_7').innerText=e.target.files[0].name
                                                                        })
                                                                    </script>
                                                                </div>
                                                            </div>
                                                            <div class="list-group-item d-flex align-items-center">
                                                                <div class="mr-auto font-weight-bold">MARET</div>
                                                                <div class="d-flex align-items-center">
                                                                    <div>
                                                                        <div> {{$item->bills[8]->status}} </div>
                                                                        <small id="status_bukti_{{ $i }}_8" class="text-muted">{{ $item->bills[8]->attachment }}</small>
                                                                    </div>
                                                                    <label for="input_bukti_{{ $i }}_8" class="btn btn-primary text-nowrap mb-0 ml-3"><i class="fas fa-upload"></i></label>
                                                                    <input type="file" accept="image/*" name="bukti_3" id="input_bukti_{{ $i }}_8" class="sr-only">
                                                                    <script>
                                                                        document.getElementById('input_bukti_{{ $i }}_8').addEventListener('change', e => {
                                                                            document.querySelector('#status_bukti_{{ $i }}_8').innerText=e.target.files[0].name
                                                                        })
                                                                    </script>
                                                                </div>
                                                            </div>
                                                            <div class="list-group-item d-flex align-items-center">
                                                                <div class="mr-auto font-weight-bold">APRIL</div>
                                                                <div class="d-flex align-items-center">
                                                                    <div>
                                                                        <div> {{$item->bills[9]->status}} </div>
                                                                        <small id="status_bukti_{{ $i }}_9" class="text-muted">{{ $item->bills[9]->attachment }}</small>
                                                                    </div>
                                                                    <label for="input_bukti_{{ $i }}_9" class="btn btn-primary text-nowrap mb-0 ml-3"><i class="fas fa-upload"></i></label>
                                                                    <input type="file" accept="image/*" name="bukti_4" id="input_bukti_{{ $i }}_9" class="sr-only">
                                                                    <script>
                                                                        document.getElementById('input_bukti_{{ $i }}_9').addEventListener('change', e => {
                                                                            document.querySelector('#status_bukti_{{ $i }}_9').innerText=e.target.files[0].name
                                                                        })
                                                                    </script>
                                                                </div>
                                                            </div>
                                                            <div class="list-group-item d-flex align-items-center">
                                                                <div class="mr-auto font-weight-bold">MEI</div>
                                                                <div class="d-flex align-items-center">
                                                                    <div>
                                                                        <div> {{$item->bills[10]->status}} </div>
                                                                        <small id="status_bukti_{{ $i }}_10" class="text-muted">{{ $item->bills[10]->attachment }}</small>
                                                                    </div>
                                                                    <label for="input_bukti_{{ $i }}_10" class="btn btn-primary text-nowrap mb-0 ml-3"><i class="fas fa-upload"></i></label>
                                                                    <input type="file" accept="image/*" name="bukti_5" id="input_bukti_{{ $i }}_10" class="sr-only">
                                                                    <script>
                                                                        document.getElementById('input_bukti_{{ $i }}_10').addEventListener('change', e => {
                                                                            document.querySelector('#status_bukti_{{ $i }}_10').innerText=e.target.files[0].name
                                                                        })
                                                                    </script>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-footer d-flex justify-content-end">
                                                <button class="btn btn-secondary mr-2" data-dismiss="modal">Batal</button>
                                                <button type="submit" class="btn btn-primary">Simpan</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
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
@push('scripts')
<script>
    function printTable(){
        var tableBill = document.getElementById('tableBill').outerHTML
        var body = document.innerHTML
        var newWindow = window.open('', '320px', '320px')
        newWindow.document.head.innerHTML = window.document.head.innerHTML
        newWindow.document.body.innerHTML = tableBill
        newWindow.print()
        newWindow.close()
    }
</script>
@endpush