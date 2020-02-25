@extends('dokter.layouts.master')

@section('content')
<div class="col-md-6">
    <div class="portlet light bordered">
        <div class="portlet-title">
            <div class="caption">
                <span class="caption-subject bold uppercase">
                    Antrian Pasien
                </span>
            </div>
        </div>
        <div class="portlet-body">
            <div class="table-responsive">
                <table class="table table-striped table-hover" id="sample_5">
                    <thead>
                        <tr>
                            <th>Nomor Antrian</th>
                            <th>Nama Pasien</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($wl as $d)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $d->pasien->name }}</td>
                            <td width="20%">
															<a href="{{ route('dokter.check', $d->id) }}" class="btn btn-info btn-xs">Periksa</a>
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