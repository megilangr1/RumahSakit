@extends('dokter.layouts.master')

@section('title')
	Pemeriksaan Pasien
@endsection

@section('content')
<div class="col-md-12">
	<div class="portlet light">
		<div class="portlet-title">
			<div class="caption">
				<span class="caption-subject bold uppercase">
					Pemeriksaan Pasien
				</span>
			</div>
		</div>
		<div class="portlet-body">
			<form action="{{ route('dokter.checked') }}" method="post">
				<div class="row">
					<div class="col-md-12">
						<div class="row">
							<div class="col-md-4">
								<div class="form-group">
									<label for="name">Nama Dokter : </label>
									<input type="text" name="doctor_name" id="doctor_name" class="form-control" value="{{ $wl->dokter->name }}" readonly>
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label for="">Nama Pasien</label>
									<input type="text" name="patient" id="patient" class="form-control" value="{{ $wl->pasien->name }}" readonly>
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label for="check_date">Tanggal Pemeriksaan : </label>
									<input type="date" name="check_date" id="check_date" class="form-control" value="{{ date('Y-m-d') }}" readonly>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-12">
						<div class="portlet box grey-cascade" style="padding: 0px; margin-bottom: 5px;">
							<div class="portlet-title">
								<div class="caption">
									<i class="fa fa-user"></i> &ensp; Data Pasien 
								</div>
								<div class="tools">
									<a href="javascript:;" class="collapse"> </a>
								</div>
							</div>
							<div class="portlet-body" style="display: none;">
								<div class="row">
									<div class="col-md-4">
										<div class="form-group">
											<label for="">NIK : </label>
											<input type="text" name="patient_nik" id="patient_nik" class="form-control" value="{{ $wl->pasien->nik }}" readonly>
										</div>
										<div class="form-group">
											<label for="">Nama Pasien : </label>
											<input type="text" name="patient_phone" id="patient_phone" class="form-control" value="{{ $wl->pasien->name }}" readonly>
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label for="">Tanggal Lahir : </label>
											<input type="date" name="patient_dob" id="patient_dob" class="form-control" value="{{ $wl->pasien->date_of_birth }}" readonly>
										</div>
										<div class="form-group">
											<label for="">Nomor Telfon : </label>
											<input type="text" name="patient_phone" id="patient_phone" class="form-control" value="{{ $wl->pasien->phone }}" readonly>
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label for="">Alamat Tempat Tinggal : </label>
											<textarea name="patient_address" id="patient_address" class="form-control" cols="5" rows="5" readonly>{{ $wl->pasien->address }}</textarea>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-12">
						<div class="portlet box grey-cascade" style="padding: 0px;">
							<div class="portlet-title">
								<div class="caption">
									<i class="fa fa-search"></i> &ensp; Pemeriksaan  
								</div>
							</div>
							<div class="portlet-body">
								<div class="row">
									<div class="col-md-4">
										<div class="form-group">
											<label for="">Hasil Diagnosa : </label>
											<input type="text" name="result" id="result" class="form-control" placeholder="Masukan Hasil Diagnosa..">
										</div>
										<div class="form-group">
											<label for="">Deskripsi Diagnosa</label>
											<textarea name="description" id="description" cols="5" rows="5" class="form-control" placeholder="Masukan Deskripsi Diagnosa.."></textarea>		
										</div>
									</div>
									<div class="col-md-8">
										<div class="table-responsive">
											<table class="table table-hover table-bordered">
												<thead>
													<tr>
														<th>No. </th>
														<th>Hasil Diagnosa</th>
														<th>Deskripsi</th>
														<th>Aksi</th>
													</tr>
												</thead>
												<tbody>
													
												</tbody>
											</table>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
@endsection