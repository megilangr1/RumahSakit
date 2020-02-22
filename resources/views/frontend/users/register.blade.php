@extends('frontend.layouts.master')

@section('content') 
<!-- BEGIN SIDEBAR -->
<div class="sidebar col-md-3 col-sm-3">
  <ul class="list-group margin-bottom-25 sidebar-menu">
    <li class="list-group-item clearfix"><a href="{{ route('user.register') }}"><i class="fa fa-angle-right"></i> Daftar</a></li>
  </ul>
</div>
<!-- END SIDEBAR -->
<!-- BEGIN CONTENT -->
<div class="col-md-9 col-sm-9">
  <h3 align="center" class="margin-bottom-20">Silahkan Buat Akun Untuk Melakukan Pendaftaran Rawat Jalan</h3>
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
    <div class="row">
      <form action="{{ route('user.regist') }}" class="form-horizontal" role="form" method="POST">
        @csrf
        <div class="col-md-6 col-sm-6">
          <fieldset>
            <div class="form-group">
              <label for="nik" class="col-lg-4 control-label">NIK : <span class="require">*</span></label>
              <div class="col-lg-8">
                <input type="text" class="form-control" id="nik" name="nik" required value="{{ old('nik') }}" autofocus>
                <p style="margin: 0px !important; color: red;">
                  {{ $errors->first('nik') }}
                </p>
              </div>
            </div>
            <div class="form-group">
              <label for="name" class="col-lg-4 control-label">Nama Lengkap : <span class="require">*</span></label>
              <div class="col-lg-8">
                <input type="text" class="form-control" id="name" name="name" required value="{{ old('name') }}">
                <p style="margin: 0px !important; color: red;">
                  {{ $errors->first('name') }}
                </p>
              </div>
            </div>
            <div class="form-group">
              <label for="date_of_birth" class="col-lg-4 control-label">Tanggal Lahir : <span class="require">*</span></label>
              <div class="col-lg-8">
                <input type="date" class="form-control" id="date_of_birth" name="date_of_birth" required value="{{ old('date_of_birth') }}">
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
                <input type="text" class="form-control" id="phone" name="phone" required value="{{ old('phone') }}">
                <p style="margin: 0px !important; color: red;">
                  {{ $errors->first('phone') }}
                </p>
              </div>
            </div> 
            <div class="form-group">
              <label for="address" class="col-lg-4 control-label">Alamat : <span class="require">*</span></label>
              <div class="col-lg-8">
                <textarea name="address" id="address" cols="5" rows="5" class="form-control">{{ old('address') }}</textarea>
                <p style="margin: 0px !important; color: red;">
                  {{ $errors->first('address') }}
                </p>
              </div>
            </div>
          </fieldset> 
        </div> 
        <div class="col-md-12 col-sm-12"> 
          <fieldset>
            <div class="form-group">
              <label for="email" class="col-lg-2 control-label">E-mail : <span class="require">*</span></label>
              <div class="col-lg-10">
                <input type="email" class="form-control" id="email" name="email" required value="{{ old('email') }}">
                <p style="margin: 0px !important; color: red;">
                  {{ $errors->first('email') }}
                </p>
              </div>
            </div>
            <div class="form-group">
              <label for="password" class="col-lg-2 control-label">Password : <span class="require">*</span></label>
              <div class="col-lg-10">
                <input type="password" class="form-control" id="password" name="password" required value="{{ old('password') }}">
                <p style="margin: 0px !important; color: red;">
                  {{ $errors->first('password') }}
                </p>
              </div>
            </div>
            <div class="form-group">
              <label for="password_confirmation" class="col-lg-2 control-label">Konfirmasi Password : <span class="require">*</span></label>
              <div class="col-lg-10">
                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
              </div>
            </div>
          </fieldset> 
        </div> 
        <div class="col-md-12"> 
          <div class="row">
            <div class="col-lg-10 col-lg-offset-2 padding-left-0 padding-top-20">                        
              <button type="submit" class="btn btn-primary btn-block">Buat Akun</button>
            </div>
          </div>
        </div>
        <div class="col-md-12">
          <div class="row">
            <div class="col-lg-10 col-lg-offset-2 padding-left-0 padding-top-0">                        
              <hr>
            </div>
          </div>
        </div>
        <div class="col-md-12"> 
          <div class="row">
            <div class="col-lg-10 col-lg-offset-2 padding-left-0 padding-top-2">                        
              <a href="{{ route('user.login') }}" class="btn btn-success btn-block" style="color: white;">Sudah Punya Akun ? Klik Di-Sini Untuk Login</a>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
<!-- END CONTENT -->
@endsection