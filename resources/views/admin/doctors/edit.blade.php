@extends('admin.layouts.master')

@section('title')
    Manajemen Dokter
@endsection

@section('content')
<div class="col-md-12">
	<div class="portlet light">
		<div class="portlet-title">
			<div class="caption">
				<span class="caption-subject bold uppercase">
					Form Dokter
				</span>
			</div>
		</div>
		<div class="portlet-body form">
			<form action="{{ route('doctors.update', $edit->id) }}" method="post" enctype="multipart/form-data">
				@csrf
				@method('PUT')
				<div class="form-body">
					<div class="row">
						<div class="col-md-6">
							<div class="form-group form-md-line-input {{ $errors->has('nip') ? 'has-error':'' }}" style="margin-bottom: 10px;">
								<input type="number" name="nip" id="nip" class="form-control" required value="{{ $edit->nip }}" autofocus autocomplete="off" disabled>
								<label for="">NIP Dokter : <span class="required">*</span></label>
								<p style="color: red;">{{ $errors->first('nip') }}</p>
							</div>
							<div class="form-group form-md-line-input {{ $errors->has('name') ? 'has-error':'' }}" style="margin-bottom: 10px;">
								<input type="text" name="name" id="name" class="form-control" required value="{{ $edit->name }}">
								<label for="">Nama Dokter : <span class="required">*</span></label>
								<p style="color: red;">{{ $errors->first('name') }}</p>
							</div>
							<div class="form-group form-md-line-input {{ $errors->has('service') ? 'has-error':'' }}" style="margin-bottom: 10px;">
								<select name="service" class="form-control custom-select" id="service">
									@foreach ($service as $s)
										<option value="{{ $s->id }}" {{ old('service') == $s->id ? 'selected':'' }}>{{ $s->name }}</option>
									@endforeach
								</select>
								<label for="">Poli / Spesialis : <span class="required">*</span></label>
								<p style="color: red;">{{ $errors->first('name') }}</p>
							</div>
							<div class="form-group form-md-line-input {{ $errors->has('date_of_birth') ? 'has-error':'' }}" style="margin-bottom: 10px;">
								<input type="date" name="date_of_birth" id="date_of_birth" class="form-control" required value="{{ $edit->date_of_birth }}">
								<label for="">Tanggal Lahir Dokter : <span class="required">*</span></label>
								<p style="color: red;">{{ $errors->first('date_of_birth') }}</p>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group form-md-line-input {{ $errors->has('phone') ? 'has-error':'' }}" style="margin-bottom: 10px;">
								<input type="text" name="phone" id="phone" class="form-control" required value="{{ $edit->phone }}">
								<label for="">No. Telfon Dokter : <span class="required">*</span></label>
								<p style="color: red;">{{ $errors->first('phone') }}</p>
							</div>
							<div class="form-group form-md-line-input {{ $errors->has('nip') ? 'has-error':'' }}" style="margin-bottom: 10px;">
								<textarea name="address" id="address" cols="5" rows="5" class="form-control" required>{{ $edit->address }}</textarea>
								<label for="">Alamat Dokter : <span class="required">*</span></label>
								<p style="color: red;">{{ $errors->first('nip') }}</p>
							</div>
						</div>
						<div class="col-md-12">
							<hr>
						</div>
						<div class="col-md-6">
							<div class="form-group form-md-line-input {{ $errors->has('email') ? 'has-error':'' }}" style="margin-bottom: 10px;">
								<input type="email" name="email" id="email" class="form-control" required value="{{ $edit->login->email }}" disabled>
								<label for="">E-Mail Dokter : <span class="required">*</span></label>
								<p style="color: red;">{{ $errors->first('email') }}</p>
							</div>
							<div class="form-group form-md-line-input {{ $errors->has('password') ? 'has-error':'' }}" style="margin-bottom: 10px;">
								<input type="password" name="password" id="password" class="form-control">
								<label for="">Password : <span class="required"></span></label>
								<p style="color: red;">{{ $errors->first('password') }}</p>
								<p>*Kosongkan Bila Tidak Ingin Mengubah Password</p>
							</div>
							<div class="form-group form-md-line-input {{ $errors->has('password_confirmation') ? 'has-error':'' }}" style="margin-bottom: 10px;">
								<input type="password" name="password_confirmation" id="password_confirmation" class="form-control">
								<label for="">Konfirmasi Password : <span class="required">*</span></label>
								<p style="color: red;">{{ $errors->first('password_confirmation') }}</p>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<img src="{{ $edit->photo != null ? asset('').'images/photo/'.$edit->photo : asset('').'images/user-no-image.jpg' }}" alt="{{ $edit->name }}" srcset="" width="150px" height="120px;">
								<p>Photo Dokter {{ $edit->name }}</p>
							</div>
							<div class="form-group form-md-line-input {{ $errors->has('photo') ? 'has-error':'' }}" style="margin-bottom: 10px;">
								<input type="file" name="photo" id="photo" class="form-control" value="{{ $edit->photo }}">
								<label for="">Photo Dokter : <span class="required">*</span></label>
								<p style="color: red;">{{ $errors->first('photo') }}</p>
							</div>
						</div>
						<div class="col-md-12">
							<button type="submit" class="btn btn-success">
								Simpan Perubahan
							</button>
							<button type="reset" class="btn btn-warning">
								Reset Data
							</button>
							<a href="{{ route('doctors.index') }}" class="btn btn-danger">
								Kembali
							</a>
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
<div class="col-md-12">
	<div class="portlet light">
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
							<th>Nama</th>
							<th>Telfon</th>
							<th>Alamat</th>
							<th>Aksi</th>
						</tr>
					</thead>
					<tbody>
						@forelse ($doctor as $d)
							<tr>
								<td>{{ $loop->iteration }}</td>
								<td>{{ $d->nip }}</td>
								<td>{{ $d->name }}</td>
								<td>{{ $d->phone }}</td>
								<td>{{ $d->login->email }}</td>
								<td>{{ $d->address }}</td>
								<td width="20%">
									<form action="{{ route('doctors.destroy', $d->id) }}" method="post">
										@csrf
										@method('DELETE')

										<a href="{{ route('doctors.edit', $d->id) }}" class="btn btn-warning btn-xs">
											Edit Data
										</a>
										<button type="submit" class="btn btn-danger btn-xs">
											Hapus Data
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