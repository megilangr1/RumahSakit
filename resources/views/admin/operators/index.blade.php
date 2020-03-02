@extends('admin.layouts.master')

@section('title')
	Manajemen Operator
@endsection

@section('content')
<div class="col-md-12">
	<div class="portlet light">
		<div class="portlet-title">
			<div class="caption">
				<span class="caption-subject bold uppercase">
					Form Operator
				</span>
			</div>
			
		</div>
		<div class="portlet-body form">
			<form action="{{ route('operators.store') }}" method="post" enctype="multipart/form-data">
				@csrf
				<div class="form-body">
					<div class="row">
						<div class="col-md-6">
							<div class="form-group form-md-line-input {{ $errors->has('nip') ? 'has-error':'' }}" style="margin-bottom: 10px;">
								<input type="number" name="nip" id="nip" class="form-control" required value="{{ old('nip') }}" autofocus autocomplete="off">
								<label for="">NIP Operator : <span class="required">*</span></label>
								<p style="color: red;">{{ $errors->first('nip') }}</p>
							</div>
							<div class="form-group form-md-line-input {{ $errors->has('name') ? 'has-error':'' }}" style="margin-bottom: 10px;">
								<input type="text" name="name" id="name" class="form-control" required value="{{ old('name') }}">
								<label for="">Nama Operator : <span class="required">*</span></label>
								<p style="color: red;">{{ $errors->first('name') }}</p>
							</div>
							<div class="form-group form-md-line-input {{ $errors->has('date_of_birth') ? 'has-error':'' }}" style="margin-bottom: 10px;">
								<input type="date" name="date_of_birth" id="date_of_birth" class="form-control" required value="{{ old('date_of_birth') }}">
								<label for="">Tanggal Lahir Operator : <span class="required">*</span></label>
								<p style="color: red;">{{ $errors->first('date_of_birth') }}</p>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group form-md-line-input {{ $errors->has('phone') ? 'has-error':'' }}" style="margin-bottom: 10px;">
								<input type="text" name="phone" id="phone" class="form-control" required value="{{ old('phone') }}">
								<label for="">No. Telfon Operator : <span class="required">*</span></label>
								<p style="color: red;">{{ $errors->first('phone') }}</p>
							</div>
							<div class="form-group form-md-line-input {{ $errors->has('nip') ? 'has-error':'' }}" style="margin-bottom: 10px;">
								<textarea name="address" id="address" cols="5" rows="5" class="form-control" required>{{ old('address') }}</textarea>
								<label for="">Alamat Operator : <span class="required">*</span></label>
								<p style="color: red;">{{ $errors->first('nip') }}</p>
							</div>
						</div>
						<div class="col-md-12">
							<hr>
						</div>
						<div class="col-md-6">
							<div class="form-group form-md-line-input {{ $errors->has('email') ? 'has-error':'' }}" style="margin-bottom: 10px;">
								<input type="email" name="email" id="email" class="form-control" required value="{{ old('email') }}">
								<label for="">E-Mail Operator : <span class="required">*</span></label>
								<p style="color: red;">{{ $errors->first('email') }}</p>
							</div>
							<div class="form-group form-md-line-input {{ $errors->has('password') ? 'has-error':'' }}" style="margin-bottom: 10px;">
								<input type="password" name="password" id="password" class="form-control" required>
								<label for="">Password : <span class="required">*</span></label>
								<p style="color: red;">{{ $errors->first('password') }}</p>
							</div>
							<div class="form-group form-md-line-input {{ $errors->has('password_confirmation') ? 'has-error':'' }}" style="margin-bottom: 10px;">
								<input type="password" name="password_confirmation" id="password_confirmation" class="form-control" required>
								<label for="">Konfirmasi Password : <span class="required">*</span></label>
								<p style="color: red;">{{ $errors->first('password_confirmation') }}</p>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group form-md-line-input {{ $errors->has('photo') ? 'has-error':'' }}" style="margin-bottom: 10px;">
								<input type="file" name="photo" id="photo" class="form-control" value="{{ old('photo') }}">
								<label for="">Photo Operator : <span class="required">*</span></label>
								<p style="color: red;">{{ $errors->first('photo') }}</p>
							</div>
						</div>
						<div class="col-md-12">
							<button type="submit" class="btn btn-success">
								Tambah Data Operator
							</button>
							<button type="reset" class="btn btn-danger">
								Reset Input
							</button>
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
					Data Operator
				</span>
			</div>
			<a href="{{ route('operatorr.index') }}" class="btn btn-primary pull-right">
				Print Data Operator
			</a>
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
							<th>E-mail Operator</th>
							<th>Aksi</th>
						</tr>
					</thead>
					<tbody>
						@forelse ($operators as $item)
							<tr>
								<td>{{ $loop->iteration }}</td>
								<td>{{ $item->nip }}</td>
								<td>{{ $item->name }}</td>
								<td>{{ $item->phone }}</td>
								<td>{{ $item->address }}</td>
                                <td>{{ $item->login->email }}</td>
								<td width="20%">
									<form action="{{ route('operators.destroy', $item->id) }}" method="post">
										@csrf
										@method('DELETE')

										<a href="{{ route('operators.edit', $item->id) }}" class="btn btn-warning btn-xs">
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