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
<div class="col-md-12">
	<div class="portlet light bordered">
		<div class="portlet-title">
			<div class="caption">
				<span class="caption-subject bold uppercase"> Form Tambah Dokter </span>
			</div>
		</div>
		<div class="portlet-body form">
			<form action="{{ route('doctors.edit') }}" method="post" enctype="multipart/form-data">
				@csrf
				<div class="form-body">
					<div class="form-group form-md-line-input {{ $errors->has('nip') ? 'has-error':'error' }}" style="margin-bottom: 10px;">
						<input value="{{ $edit->nip }}" type="numeric" name="nip" id="nip" class="form-control" required autofocus >
						<label for="nip">NIP :* </label>
						<span class="help-block">{{ $errors->first('nip') }}</span>
					</div>
					<br>
					<div class="form-group form-md-line-input {{ $errors->has('nama') ? 'has-error':'erorr' }}" style="margin-bottom: 10px;">
						<input value="{{ $edit->name }}" type="text" name="nama" id="nama" class="form-control" required autofocus >
						<label for="nama">Nama Dokter :* </label>
						<span class="help-block">{{ $errors->first('nama') }}</span>
                    </div>
					<br>
					<div class="form-group form-md-line-input {{ $errors->has('poli') ? 'has-error':'erorr' }}" style="margin-bottom: 10px;">
						<label for="poli">Nama Poli :* </label>
						<select name="service" class="form-control custom-select" id="inputGroupSelect01">
							@foreach ($service as $s)
								<option value="{{ $s->id }}">{{ $s->name }}</option>
							@endforeach
						</select>
						<span class="help-block">{{ $errors->first('poli') }}</span>
                    </div>
                    <br>
                    <div class="form-group form-md-line-input {{ $errors->has('dob') ? 'has-error':'error' }}" style="margin-bottom: 10px;">
						<input value="{{ $edit->date_of_birth }}" type="date" name="dob" id="dob" class="form-control" required autofocus >
						<label for="dob">Tanggal Lahir :* </label>
						<span class="help-block">{{ $errors->first('dob') }}</span>
                    </div>
                    <br>
                    <div class="form-group form-md-line-input {{ $errors->has('noHp') ? 'has-error':'error' }}" style="margin-bottom: 10px;">
						<input value="{{ $edit->phone }}" type="text" name="noHp" id="noHp" class="form-control" required autofocus >
						<label for="noHp">Nomor Hp :* </label>
						<span class="help-block">{{ $errors->first('noHp') }}</span>
                    </div>
                    <br>
                    <div class="form-group form-md-line-input {{ $errors->has('address') ? 'has-error':'error' }}" style="margin-bottom: 10px;">
						<input value="{{ $edit->address }}" type="text" name="address" id="address" class="form-control" required autofocus >
						<label for="address">Alamat :* </label>
						<span class="help-block">{{ $errors->first('address') }}</span>
                    </div>
                    <br>
                    <div class="form-group form-md-line-input {{ $errors->has('photo') ? 'has-error':'error' }}" style="margin-bottom: 10px;">
						<input value="{{ $edit->photo }}" type="file" name="photo" id="photo" class="form-control" autofocus >
						<label for="photo">Foto :* </label>
						<span class="help-block">{{ $errors->first('photo') }}</span>
                    </div>
					<br>
					<div class="form-group form-md-line-input {{ $errors->has('email') ? 'has-error':'error' }}" style="margin-bottom: 10px;">
						<input value="{{ $edit->email }}" type="email" name="email" id="email" class="form-control" required autofocus >
						<label for="email">Email :* </label>
						<span class="help-block">{{ $errors->first('email') }}</span>
					</div>
					<br>
					<div class="form-group form-md-line-input {{ $errors->has('password') ? 'has-error':'error' }}" style="margin-bottom: 10px;">
						<input value="{{ $edit->password }}" type="password" name="password" id="password" class="form-control" required autofocus >
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
@endsection