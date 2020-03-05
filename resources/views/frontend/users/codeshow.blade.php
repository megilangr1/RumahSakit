@extends('frontend.layouts.master')

@section('content')
@include('frontend.layouts.sidebar')
<style>
	h4 {
		font-weight: 500;
		margin: 0px !important;
	}
</style>
<div class="col-md-9 col-sm-9">
	<h3 align="center" class="margin-bottom-20">Silahkan Tunjukan Nomor Ini Kepada Resepsionis Pendaftaran</h3>
	<hr>
	<div class="content-form-page">
		@if (session('success'))
		<div class="alert alert-success alert-dismissible" role="alert">
			<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			{{ session('success') }}
		</div>
		@endif
		{{-- <div class="col-md-offset-4" style="margin-bottom: 5px">
			<a href="{{ route('print_pendaftaran.index') }}" style="margin-left: 40px" class="btn btn-success">Print Nomor Pendaftaran</a>
		</div> --}}
		<div class="row">
			<div class="col-md-6 col-md-offset-3 text-center" style="border: 0.1rem solid #000000; padding: 15px 15px;">
				<div class="row">
					<div class="col-md-12">
						<h3>Nomor Pendaftaran : </h3>
						<h3 style="color: yellow; font-weight: 600; margin: 10px 0px; background-color: grey;">
							{{ $regist->number }}
						</h3>
					</div>
					<div class="col-md-12">
						<table class="table" style="margin:0px;">
							<tr>
								<td colspan="2">
									<h4>NIK : {{ $regist->pasien->nik }}</h4>
								</td>
							</tr>
							<tr>
								<td colspan="2">
									<h4> Nama Pasien : {{ $regist->pasien->name }}</h4>
								</td>
							</tr>
							<tr>
								<td colspan="2">
									<h4> Poli Yang Dituju : {{ $regist->service->name }}</h4>
								</td>
							</tr>
							<tr>
								<td colspan="2">
									<br>
								</td>
							</tr>
							<tr>
								<td>
									<h5>Tanggal Berobat : <br><br> <b style="padding-top: 4px;">{{ date('d-m-Y', strtotime($regist->regist_date)) }}</b></h5>
								</td>
								<td>
									<h5>Karcis Berakhir :<br><br> <b style="padding-top: 4px;">{{ date('d-m-Y', strtotime($regist->expired_date)) }}</h5>
								</td>
							</tr>
							<tr>
								<td colspan="2"></td>
							</tr>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection