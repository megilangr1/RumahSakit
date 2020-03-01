@extends('operator.layouts.master')

@section('title')
Lanjutkan Pendaftar Ke Ruang Tunggu
@endsection

@section('content')
<div class="col-md-12">
    <div class="portlet light">
        <div class="portlet-title">
            <div class="caption">
                <span class="caption-subject bold uppercase">
                    Data Pasien
                </span>
            </div>
        </div>
        <div class="portlet-body">
			<form action="{{ route('operator.assign') }}" method="POST" class="form-horizontal" role="form">
				@csrf
				<div class="form-body">
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label class="control-label col-md-3">Nomor Pendaftaran :</label>
								<div class="col-md-9">
									<p class="form-control-static">
										{{ $regist->number }}
									</p>
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label class="control-label col-md-3">NIK :</label>
								<div class="col-md-9">
									<p class="form-control-static">
										{{ $regist->pasien->nik }}
									</p>
								</div>
							</div>
						</div>
						<!--/span-->
					</div>
					<!--/row-->
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label class="control-label col-md-3">Nama Pasien:</label>
								<div class="col-md-9">
									<p class="form-control-static">
										{{ $regist->pasien->name }}
									</p>
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label class="control-label col-md-3">Tanggal Lahir:</label>
								<div class="col-md-9">
									<p class="form-control-static">
										{{ date('d-m-Y', strtotime($regist->pasien->date_of_birth)) }}
									</p>
								</div>
							</div>
						</div>
						<!--/span-->
					</div>
					<!--/row-->
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label class="control-label col-md-3">No. Telfon:</label>
								<div class="col-md-9">
									<p class="form-control-static">
										{{ $regist->pasien->phone }}
									</p>
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label class="control-label col-md-3">Alamat :</label>
								<div class="col-md-9">
									<p class="form-control-static">
										{{ $regist->pasien->address }}
									</p>
								</div>
							</div>
						</div>
					</div>
					<!--/row-->
					<h3 class="form-section">Pendaftaran Rawat Jalan</h3>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label class="control-label col-md-3">Poli dituju:</label>
								<div class="col-md-9">
									<p class="form-control-static">
										{{ $regist->service->name }}
									</p>
								</div>
							</div>
						</div>
							@if ($regist->status == 0)
							<div class="col-md-6">
								<div class="form-group">
									<label class="control-label col-md-3">Dokter :</label>
									<div class="col-md-9">
										<p class="form-control-static">
											<select name="doctor_id" id="doctor_id" class="form-control" style="width: 100% !important;" required>
												<option value="">- Pilih Dokter -</option>
												@foreach ($doctor as $d)
													<option value="{{ $d->id }}">{{ $d->name }}</option>
												@endforeach
											</select>
										</p>
									</div>
								</div>
							</div>
							@endif
					</div>
						<div class="row">
								<div class="col-md-6">
										<div class="form-group">
												<label class="control-label col-md-3">Berlaku:</label>
												<div class="col-md-9">
														<p class="form-control-static">
																{{ date('d-m-Y', strtotime($regist->regist_date)) }}
														</p>
												</div>
										</div>
								</div>
								<!--/span-->
								<div class="col-md-6">
										<div class="form-group">
												<label class="control-label col-md-3">Kadaluarsa:</label>
												<div class="col-md-9">
														<p class="form-control-static">
																{{ date('d-m-Y', strtotime($regist->expired_date)) }}
														</p>
												</div>
										</div>
								</div>
								<!--/span-->
						</div>
						<!--/row-->
						<div class="row">
								<div class="col-md-6">
										<div class="form-group">
												<label class="control-label col-md-3">Status:</label>
												<div class="col-md-9">
														<p class="form-control-static">
															@php
															if ($regist->status == 0) {
																echo "<button type='button' class='btn btn-xs btn-info'>Belum di-Gunakan</button>";
															} else if ($regist->status == 1) {
																echo "<button type='button' class='btn btn-xs btn-danger'>Sudah di-Gunakan</button>";
															}
															@endphp
														</p>
												</div>
										</div>
								</div>
								<!--/span-->
						</div>
				</div>
					<div class="form-actions">
							<div class="row">
									<div class="col-md-6">
											<div class="row">
													<div class="col-md-offset-3 col-md-9">
														@if ($regist->status == 0)
															<input type="hidden" name="regist_number" value="{{ $regist->number }}" readonly>
															<button type="submit" class="btn green"><i class="fa fa-check"></i> Masukan Ke Daftar Antrian Dokter</button>
															<a href="{{ route('operator.regist') }}" class="btn default">Kembali</a>
														@endif
													</div>
											</div>
									</div>
									<div class="col-md-6">
									</div>
							</div>
					</div>
			</form>
        </div>
    </div>
</div>
@endsection
