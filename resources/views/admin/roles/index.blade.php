@extends('admin.layouts.master')

@section('title')
	Manajemen Role
@endsection

@section('content')
<div class="col-md-6">
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
				<div class="form-body"></div>
			</form>
		</div>
	</div>
</div>
@endsection