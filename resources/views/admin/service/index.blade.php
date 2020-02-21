@extends('admin.layouts.master')

@section('css')
<style>
	.dataTables_scrollBody {
		height: 200px !important;
	}
</style>
@endsection

@section('title')
	Manajemen Poli
@endsection

@section('content')
<div class="col-md-5">
	<!-- BEGIN SAMPLE FORM PORTLET-->
	<div class="portlet light bordered">
		<div class="portlet-title">
			<div class="caption">
				<span class="caption-subject bold uppercase"> Form Tambah Poli </span>
			</div>
		</div>
		<div class="portlet-body form">
			<form action="{{ route('services.store') }}" method="post">
				@csrf
				<div class="form-body">
					<div class="form-group form-md-line-input {{ $errors->has('name') ? 'has-error':'' }}" style="margin-bottom: 10px;">
						<input type="text" name="name" id="name" class="form-control" required autofocus >
						<label for="name">Nama Poli :* </label>
						<span class="help-block">{{ $errors->first('name') }}</span>
					</div>
					<br>
					<div class="form-group form-md-line-input {{ $errors->has('description') ? 'has-error':'' }}" style="margin-bottom: 10px;">
						<input type="text" name="description" id="description" class="form-control" required autofocus >
						<label for="description">Deskripsi :* </label>
						<span class="help-block">{{ $errors->first('description') }}</span>
					</div>
					<div class="form-actions noborder">
						<button type="submit" class="btn blue">Tambah Data Poli</button>
						<button type="button" class="btn default">Reset Input</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
<div class="col-md-7">
	<div class="portlet light bordered">
		<div class="portlet-title">
			<div class="caption">
				<span class="caption-subject bold uppercase">
					Data Poli
				</span>
			</div>
		</div>
		<div class="portlet-body">
			<div class="table-responsive">
				<table class="table table-striped table-hover" id="sample_5">
					<thead>
						<tr>
							<th>#</th>
							<th>Nama Poli</th>
							<th>Deskripsi</th>
							<th>Aksi</th>
						</tr>
					</thead>
					<tbody>
						@php
							$no = 1;
						@endphp
						@forelse ($service as $s)
							<tr>
								<td>{{ $no++ }}</td>
								<td>{{ $s->name }}</td>
								<td>{{ $s->description }}</td>
								<td width="20%" align="center">
									<form action="{{ route('services.destroy', $s->id) }}" method="post">
										@csrf
										@method('DELETE')  
										<button type="submit" class="btn btn-danger btn-xs">
											Hapus
										</button> 
									</form>
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