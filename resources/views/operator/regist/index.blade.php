@extends('operator.layouts.master')

@section('content')

<div class="col-md-12">
    <div class="portlet light bordered">
        <div class="portlet-title">
            <div class="caption">
                <span class="caption-subject bold uppercase">
                    Data Pasien Pendaftaran Rawat Jalan
                </span>
            </div>
            
        </div>
        <div class="portlet-body">
            <div class="table-responsive">
                <table class="table table-striped table-hover" id="sample_5">
                    <thead>
                        <tr>
                            <th>Nomor Pendaftaran</th>
                            <th>Nama Pasien</th>
                            <th>Poli Di-Tuju</th>
                            <th>Tanggal Daftar</th>
                            <th>Kadaluarsa</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($regist as $d)
                        <tr>
                            <td>{{ $d->number }}</td>
                            <td>{{ $d->pasien->name }}</td>
                            <td>{{ $d->service->name }}</td>
                            <td>{{ date('d-m-Y', strtotime($d->regist_date)) }} {{ $d->regist_date == date('Y-m-d') ? '(Hari Ini)':'' }}</td>
                            <td>{{ date('d-m-Y', strtotime($d->expired_date)) }}</td>
                            <td width="20%" colspan="2">
                                <a href="{{ route('operator.next', $d->number) }}" class="btn btn-info btn-xs">Lanjutkan</a>
                            </td>
                        </tr>
                        @empty

                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
