@extends('frontend.layouts.master')

@section('content')
@include('frontend.layouts.sidebar')
<div class="col-md-9 col-sm-9">
	<h3 align="center" class="margin-bottom-20">Silahkan Lengkapi Form Daftar Rawat Jalan</h3>
	<hr>
	<div class="content-form-page">
		@if (session('success'))
		<div class="alert alert-success alert-dismissible" role="alert">
			<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			{{ session('success') }}
		</div>
		@endif

		@if (session('error'))
		<div class="alert alert-danger alert-dismissible" role="alert">
			<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			{{ session('error') }}
		</div>
		@endif

		@if (session('fail'))
		<div class="alert alert-danger alert-dismissible" role="alert">
			<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			{{ session('fail') }}
		</div>
		@endif
		<div class="row">
			<form action="{{ route('daftar.rawat.jalan') }}" class="form-horizontal" role="form" method="POST">
				@csrf
				<div class="col-md-6 col-sm-6">
					<fieldset>
						<div class="form-group">
							<label for="nik" class="col-lg-4 control-label">NIK : <span class="require">*</span></label>
							<div class="col-lg-8">
								<input type="text" class="form-control" id="nik" name="nik" required value="{{ $user->pasien->nik }}" readonly>
								<p style="margin: 0px !important; color: red;">
									{{ $errors->first('nik') }}
								</p>
							</div>
						</div>
						<div class="form-group">
							<label for="name" class="col-lg-4 control-label">Nama Lengkap : <span class="require">*</span></label>
							<div class="col-lg-8">
								<input type="text" class="form-control" id="name" name="name" required value="{{ $user->pasien->name }}" readonly>
								<p style="margin: 0px !important; color: red;">
									{{ $errors->first('name') }}
								</p>
							</div>
						</div>
						<div class="form-group">
							<label for="date_of_birth" class="col-lg-4 control-label">Tanggal Lahir : <span class="require">*</span></label>
							<div class="col-lg-8">
								<input type="date" class="form-control" id="date_of_birth" name="date_of_birth" required value="{{ $user->pasien->date_of_birth }}" readonly>
								<p style="margin: 0px !important; color: red;">
									{{ $errors->first('date_of_birth') }}
								</p>
							</div>
						</div> 
					</fieldset>
				</div> 
				<div class="col-md-6 col-sm-6"> 
					<fieldset>
						<div class="form-group">
							<label for="phone" class="col-lg-4 control-label">Nomor Telfon : <span class="require">*</span></label>
							<div class="col-lg-8">
								<input type="text" class="form-control" id="phone" name="phone" required value="{{ $user->pasien->phone }}" readonly>
								<p style="margin: 0px !important; color: red;">
									{{ $errors->first('phone') }}
								</p>
							</div>
						</div> 
						<div class="form-group">
							<label for="address" class="col-lg-4 control-label">Alamat : <span class="require">*</span></label>
							<div class="col-lg-8">
								<textarea name="address" id="address" cols="5" rows="5" class="form-control" readonly>{{ $user->pasien->address }}</textarea>
								<p style="margin: 0px !important; color: red;">
									{{ $errors->first('address') }}
								</p>
							</div>
						</div>
					</fieldset> 
				</div> 
				<div class="col-md-6 col-sm-6">
					<fieldset>
						<div class="form-group">
							<label for="poli" class="col-lg-4 control-label">Poli Yang Dituju : </label>
							<div class="col-lg-8">
								<select name="service_id" id="service_id" class="form-control" required>
									<option value="">- Pilih Poli -</option>
									@foreach ($services as $item)
										<option value="{{ $item->id }}">{{ $item->name }}</option>
									@endforeach
								</select>
							</div>
						</div>
					</fieldset>					
				</div>
				<div class="col-md-6 col-sm-6">
					<fieldset>
						<div class="form-group">
							<label for="regist_date" class="col-lg-4 control-label">Tanggal Berobat :</label>
							<div class="col-lg-8">
								<input type="date" class="form-control" id="regist_date" name="regist_date" required value="{{ date('Y-m-d') }}" >
								<p style="margin: 0px !important; color: red;">
									{{ $errors->first('regist_date') }}
								</p>
							</div>
						</div> 
					</fieldset>					
				</div>
				<div class="col-md-12"> 
					<div class="row">
						<div class="col-lg-10 col-lg-offset-2 padding-left-0 padding-top-20">                        
							<button type="submit" class="btn btn-primary btn-block">Daftar Rawat Jalan</button>
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
@endsection