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
									<input type="text" name="patient_id" id="patient_id" value="{{ $wl->pasien->id }}" readonly hidden>
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
											<input type="text" name="patient_name" id="patient_name" class="form-control" value="{{ $wl->pasien->name }}" readonly>
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
										<div class="form-group">
											<a href="javascript:void(0)" id="add" class="btn btn-primary btn-sm">
												Tambah Hasil Diagnosa
											</a>
											<a href="javascript:void(0)" id="reset" class="btn btn-danger btn-sm">
												Reset Form
											</a>
										</div>
									</div>
									<div class="col-md-8">
										<h5 class="bold">Tabel Diagnosa</h5>
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
												<tbody id="diagnoseBody">
													@forelse ($cart->getContent() as $item)
														@if ($item->name == 'Diagnosa '.$wl->pasien->name)
															<tr>
																<td>{{ $loop->iteration }}</td>
																<td>{{ $item->attributes->diagnosa }}</td>
																<td>{{ $item->attributes->desc }}</td>
																<td>
																	<a href="javascript:void(0)" data-id="{{ $item->id }}" class="btn btn-danger btn-xs diagDelete">
																		Hapus
																	</a>
																</td>
															</tr>
														@endif
													@empty
														<tr>
															<td colspan="4">Belum Ada Hasil Diagnosa</td>
														</tr>
													@endforelse
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

@section('script')
<script src="{{ asset('') }}other/jquery/jquery-3.4.1.min.js"></script>
<script>
	$(document).ready(function() {
		function getData() {
			$.ajax({
				url: "{{ route('diagnose.get') }}",
				method: 'POST',
				data: {
					_token:"{{ csrf_token() }}"
				},
				success: function(data) {
					var a = Object.values(data);
					console.log(a);
					if (a.length == 0) {
						$('#diagnoseBody tr').remove();
						$('#diagnoseBody').append(`
							<tr>
								<td colspan="4">Belum Ada Hasil Diagnosa</td>
							</tr>
						`);
					} else {
						var no = 1;
						$('#diagnoseBody tr').remove();
						a.forEach(data => {
							$('#diagnoseBody').append(`
								<tr>
									<td>${no++}</td>
									<td>${data.attributes.diagnosa}</td>
									<td>${data.attributes.desc}</td>
									<td>
										<a href="javascript:void(0)" data-id="${data.id}" class="btn btn-danger btn-xs diagDelete" >
											Hapus
										</a>
									</td>
								</tr>
							`);
						});
					}
				} 
			});
		}

		function add() {
			var diagnosa = $('#result').val()
			var desc = $('#description').val();
			var patient = $('#patient').val();
			var patient_id = $('#patient_id').val();

			if (diagnosa == '') {
				$('#result').focus();
				alert('Nama Diagnosa Tidak Boleh Kosong !');
			} else {
				$.ajax({
					url: "{{ route('diagnose.add') }}",
					method: 'POST',
					data: {
						_token: "{{ csrf_token() }}",
						diagnosa: diagnosa,
						desc: desc,
						name: "Diagnosa "+patient,
						patient_id: patient_id,
					},
					success: function(data) {
						clear();
						getData();
					}
				});
			}
		}

		function clear() {
			$('#result').val('');
			$('#description').val('');
		}

		function deleteDiagnose(rowId) {
			var id = rowId;
			$.ajax({
				url: "{{ route('diagnose.delete') }}",
				method: 'POST',
				data: {
					_token: "{{ csrf_token() }}",
					id: id
				},
				success: function(data) {
					getData();
				}
			});
		}

		$('#add').on('click', function() {
			add();
		});

		$('#add').on('keydown', function(event) {
			if (event.keyCode == 32) {
				add();
			}
		});

		$('#diagnoseBody').on('click', '.diagDelete', function() {
			var rowId = $(this).data('id');
			deleteDiagnose(rowId);
		});

	});
</script>
@endsection