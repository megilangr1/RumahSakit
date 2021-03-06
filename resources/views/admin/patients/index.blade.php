@extends('admin.layouts.master')

@section('css')
<style>
	.dataTables_scrollBody {
		height: 200px !important;
	}
</style>
@endsection

@section('title')
	Manajemen Pasien
@endsection

@section('content')
<div class="col-md-12">
	<div class="portlet light bordered">
		<div class="portlet-title">
			<div class="caption">
				<span class="caption-subject bold uppercase">
					Data Pasien
				</span>
			</div>
			<a href="{{ route('pasiens.index') }}" class="btn btn-success pull-right">Print Data Pasien</a>
		</div>
		<div class="portlet-body">
			<div class="table-responsive">
				<table class="table table-striped table-hover" id="sample_5">
					<thead>
						<tr>
							<th>#</th>
							<th>NIK</th>
                            <th>Nama Pasien</th>
                            <th>Tgl Lahir</th>
                            <th>No Telepon</th>
                            <th>Alamat</th>
							<th>Aksi</th>
						</tr>
					</thead>
					<tbody>
						@php
							$no = 1;
						@endphp
						@forelse ($patient as $p)
							<tr>
								<td>{{ $no++ }}</td>
								<td>{{ $p->nik }}</td>
								<td>{{ $p->name }}</td>
								<td>{{ $p->date_of_birth }}</td>
								<td>{{ $p->phone }}</td>
								<td>{{ $p->address }}</td>
								<td width="20%" class="text-center" colspan="2">
									<a href="{{ route('patients.show',$p->id) }}" class="btn btn-warning btn-xs">Detail Pasien</a>
									{{-- <a href="{{ route('pasienns.index',$p->id) }}" class="btn btn-danger btn-xs">Print Detail Pasien</a> --}}
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