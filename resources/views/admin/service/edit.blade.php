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
				<span class="caption-subject bold uppercase"> Edit Tambah Poli </span>
			</div>
		</div>
		<div class="portlet-body form">
			<form action="{{ route('services.update', $edit->id) }}" method="post">
                @csrf
                @method('PUT')
				<div class="form-body">
					<div class="form-group form-md-line-input {{ $errors->has('name') ? 'has-error':'' }}" style="margin-bottom: 10px;">
						<input value="{{ $edit->name }}" type="text" name="name" id="name" class="form-control" required autofocus >
						<label for="name">Nama Poli :* </label>
						<span class="help-block">{{ $errors->first('name') }}</span>
					</div>
					<br>
					<div class="form-group form-md-line-input {{ $errors->has('description') ? 'has-error':'' }}" style="margin-bottom: 10px;">
						<input value="{{ $edit->description }}" type="text" name="description" id="description" class="form-control" required autofocus >
						<label for="description">Deskripsi :* </label>
						<span class="help-block">{{ $errors->first('description') }}</span>
					</div>
					<div class="form-actions noborder">
						<button type="submit" class="btn blue">Edit Data Poli</button>
						<a href="{{ route('services.index') }}" class="btn default">
							Kembali
						</a>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
@endsection