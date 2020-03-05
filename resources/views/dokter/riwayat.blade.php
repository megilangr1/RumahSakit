@extends('dokter.layouts.master')

@section('content')
<div class="col-md-12">
	<div class="portlet light">
		<div class="portlet-title">
			<div class="caption">
				<span class="caption-subject bold uppercase">
					Data Riwayat Pemeriksaan
				</span>
			</div>
			<a href="{{ route('riwayat.index') }}" class="btn btn-primary pull-right">
				Print Data Riwayat Pemeriksaan
			</a>
		</div>
		<div class="portlet-body">
			<div class="table-responsive">
				<table class="table table-striped table-hover" id="sample_5">
					<thead>
						<tr>
							<th>#</th>
							<th>Tgl Check Up</th>
							<th>Nama Pasien</th>
                            <th>Nama Dokter</th>
                            <th>Hasil Diagnosa</th>
						</tr>
					</thead>
					<tbody>
						@forelse ($cek as $c)
							<tr>
								<td>{{ $loop->iteration }}</td>
								<td>{{ $c->check_date }}</td>
                                <td>{{ $c->pasien->name }}</td>
                                <td>{{ $c->dokter->name }}</td>
                                <td>{{ $c->diagnosa->result }}</td>
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