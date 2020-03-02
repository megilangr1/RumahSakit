@extends('frontend.layouts.master')

@section('content')
@include('frontend.layouts.sidebar')

<div class="col-md-9 col-sm-9">
	<h3>Data Nomor Pendaftaran Yang di-Buat</h3>
	<hr>
	<div class="content-form-page">
		<div class="table-responsive">
			<table class="table table-bordered table-striped table-hover">
				<thead>
					<tr>
						<td>#</td>
						<td>Tanggal Pemeriksaan</td>
						<td>Nama Dokter</td>
						<td>Poli</td>
						<td>Jumlah Diagnosa</td>
						<td>Jumlah Obat</td>
						<td>Aksi</td>
					</tr>
				</thead>
				<tbody>
					@forelse ($check as $item)
						<tr>
							<td>{{ $loop->iteration }}</td>
							<td>{{ $item->check_date }}</td>
							<td>{{ $item->dokter->name }}</td>
							<td>{{ $item->dokter->service->name }}</td>
							<td>Total Diagnosa : {{ count($item->diagnosa) }}</td>
							<td>Total Obat : {{ count($item->obat) }}</td>
							<td align="center">
								<a href="{{ route('user.history.detail', $item->id) }}" target="_blank" class="btn btn-info btn-xs">
									Detail
								</a>
							</td>
						</tr>
					@empty
						<tr>
							<td colspan="7">
								Belum Ada Pendaftaran Rawat Jalan di-Buat !
							</td>
						</tr>
					@endforelse
				</tbody>
			</table>
		</div>
	</div>
</div>
@endsection