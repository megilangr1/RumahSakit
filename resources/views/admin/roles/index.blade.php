@extends('admin.layouts.master')

@section('css')
<style>
	.dataTables_scrollBody {
		height: 200px !important;
	}
</style>
@endsection

@section('title')
	Manajemen Role
@endsection

@section('content')
<div class="col-md-5">
	<!-- BEGIN SAMPLE FORM PORTLET-->
	<div class="portlet light bordered">
		<div class="portlet-title">
			<div class="caption">
				<span class="caption-subject bold uppercase"> Form Tambah Role </span>
			</div>
		</div>
		<div class="portlet-body form">
			<form action="{{ route('roles.store') }}" method="post">
				@csrf
				<div class="form-body">
					<div class="form-group form-md-line-input {{ $errors->has('name') ? 'has-error':'' }}" style="margin-bottom: 10px;">
						<input type="text" name="name" id="name" class="form-control" required autofocus >
						<label for="name">Nama Role :* </label>
						<span class="help-block">{{ $errors->first('name') }}</span>
					</div>
					<div class="form-actions noborder">
						<button type="submit" class="btn btn-success">Tambah Data Role</button>
						<button type="reset" class="btn btn-danger">Reset Input</button>
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
					Data Role
				</span>
			</div>
		</div>
		<div class="portlet-body">
			<div class="table-responsive">
				<table class="table table-striped table-hover" id="sample_5">
					<thead>
						<tr>
							<th>#</th>
							<th>Nama Role</th>
							<th>Aksi</th>
						</tr>
					</thead>
					<tbody>
						@forelse ($roles as $item)
							<tr>
								<td>{{ $loop->iteration }}</td>
								<td>{{ $item->name }}</td>
								<td width="20%" align="center">
									<form action="{{ route('roles.destroy', $item->id) }}" method="post">
										@csrf
										@method('DELETE')  
										<button type="submit" class="btn btn-danger btn-xs">
											Hapus
										</button> 
									</form>
								</td>
							</tr>
						@empty
							<tr>
								<td colspan="3" align="center">
									Belum Ada Data Role
								</td>
							</tr>
						@endforelse
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
@endsection