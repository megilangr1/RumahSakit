@extends('admin.layouts.master')

@section('css')
<style>
	.dataTables_scrollBody {
		height: 200px !important;
	}
</style>
@endsection

@section('title')
	Manajemen Dokter
@endsection

@section('content')
<div class="col-md-5">
	<!-- BEGIN SAMPLE FORM PORTLET-->
	<div class="portlet light bordered">
		<div class="portlet-title">
			<div class="caption">
				<span class="caption-subject bold uppercase"> Form Tambah Dokter </span>
			</div>
		</div>
		<div class="portlet-body form">
			<form action="{{ route('doctors.store') }}" method="post" enctype="multipart/form-data">
				@csrf
				<div class="form-body">
					<div class="form-group form-md-line-input {{ $errors->has('nip') ? 'has-error':'' }}" style="margin-bottom: 10px;">
						<input type="numeric" name="nip" id="nip" class="form-control" required autofocus >
						<label for="nip">NIP :* </label>
						<span class="help-block">{{ $errors->first('nip') }}</span>
					</div>
					<br>
					<div class="form-group form-md-line-input {{ $errors->has('nama') ? 'has-error':'' }}" style="margin-bottom: 10px;">
						<input type="text" name="nama" id="nama" class="form-control" required autofocus >
						<label for="nama">Nama Dokter :* </label>
						<span class="help-block">{{ $errors->first('nama') }}</span>
                    </div>
                    <br>
                    <div class="form-group form-md-line-input {{ $errors->has('dob') ? 'has-error':'' }}" style="margin-bottom: 10px;">
						<input type="date" name="dob" id="dob" class="form-control" required autofocus >
						<label for="dob">Tanggal Lahir :* </label>
						<span class="help-block">{{ $errors->first('dob') }}</span>
                    </div>
                    <br>
                    <div class="form-group form-md-line-input {{ $errors->has('noHp') ? 'has-error':'' }}" style="margin-bottom: 10px;">
						<input type="text" name="noHp" id="noHp" class="form-control" required autofocus >
						<label for="noHp">Nomor Hp :* </label>
						<span class="help-block">{{ $errors->first('noHp') }}</span>
                    </div>
                    <br>
                    <div class="form-group form-md-line-input {{ $errors->has('address') ? 'has-error':'' }}" style="margin-bottom: 10px;">
						<input type="text" name="address" id="address" class="form-control" required autofocus >
						<label for="address">Alamat :* </label>
						<span class="help-block">{{ $errors->first('address') }}</span>
                    </div>
                    <br>
                    <div class="form-group form-md-line-input {{ $errors->has('photo') ? 'has-error':'' }}" style="margin-bottom: 10px;">
						<input type="file" name="photo" id="photo" class="form-control" required autofocus >
						<label for="photo">Foto :* </label>
						<span class="help-block">{{ $errors->first('photo') }}</span>
                    </div>
					<br>
					<div class="form-group form-md-line-input {{ $errors->has('email') ? 'has-error':'' }}" style="margin-bottom: 10px;">
						<input type="email" name="email" id="email" class="form-control" required autofocus >
						<label for="email">Email :* </label>
						<span class="help-block">{{ $errors->first('email') }}</span>
					</div>
					<br>
					<div class="form-group form-md-line-input {{ $errors->has('password') ? 'has-error':'' }}" style="margin-bottom: 10px;">
						<input type="password" name="password" id="password" class="form-control" required autofocus >
						<label for="password">Password :* </label>
						<span class="help-block">{{ $errors->first('password') }}</span>
					</div>
					<br>

					<div class="form-actions noborder">
						<button type="submit" class="btn blue">Tambah Data Dokter</button>
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
					Data Dokter
				</span>
			</div>
		</div>
		<div class="portlet-body">
			<div class="table-responsive">
				<table class="table table-striped table-hover" id="sample_5">
					<thead>
						<tr>
							<th>#</th>
							<th>NIP</th>
                            <th>Nama Dokter</th>
                            <th>Poli</th>
                            <th>Tgl Lahir</th>
                            <th>No Telepon</th>
                            <th>Alamat</th>
                            <th>Foto</th>
							<th>Aksi</th>
						</tr>
					</thead>
					<tbody>
						@php
							$no = 1;
						@endphp
						@forelse ($doctor as $d)
							<tr>
								{{-- <td>{{ $no++ }}</td>
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
								</td> --}}
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