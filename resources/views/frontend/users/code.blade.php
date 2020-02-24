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
						<td>Nomor</td>
						<td>Nama</td>
						<td>Poli</td>
						<td>Tanggal</td>
						<td>Kadaluarsa</td>
						<td>Aksi</td>
					</tr>
				</thead>
				<tbody>
					@forelse ($regist as $item)
						<tr>
							<td>{{ $loop->iteration }}</td>
							<td>{{ $item->number }}</td>
							<td>{{ $item->pasien->name }}</td>
							<td>{{ $item->service->name }}</td>
							<td>{{ date('d-m-Y', strtotime($item->regist_date)) }}</td>
							<td>{{ date('d-m-Y', strtotime($item->expired_date)) }}</td>
							<td align="center">
								@if (now() > $item->expired_date)
								<form action="{{ route('delete.rawat.jalan', $item->id) }}" method="post">
									@csrf
									@method('DELETE')
									<button type="submit" class="btn btn-danger btn-xs">
										Hapus
									</button>
								</form>
								@else
								<a href="{{ route('code.rawat.jalan', $item->id) }}" class="btn btn-info btn-xs" style="color: #fff;">
									Lihat
								</a>
								@endif
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