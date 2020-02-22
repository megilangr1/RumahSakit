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
  <div class="content-form-page">
    <div class="row">
      <form class="form-horizontal" role="form">
        <div class="col-md-6 col-sm-6">
          <fieldset>
            <div class="form-group">
              <label for="nik" class="col-lg-4 control-label">NIK : <span class="require">*</span></label>
              <div class="col-lg-8">
                <input type="text" class="form-control" id="nik" name="nik" required autofocus>
              </div>
            </div>
            <div class="form-group">
              <label for="name" class="col-lg-4 control-label">Nama Lengkap : <span class="require">*</span></label>
              <div class="col-lg-8">
                <input type="text" class="form-control" id="name" name="name" required>
              </div>
            </div>
            <div class="form-group">
              <label for="date_of_birth" class="col-lg-4 control-label">Tanggal Lahir : <span class="require">*</span></label>
              <div class="col-lg-8">
                <input type="date" class="form-control" id="date_of_birth" name="date_of_birth">
              </div>
            </div> 
          </fieldset>
        </div> 
        <div class="col-md-6 col-sm-6"> 
          <fieldset>
            <div class="form-group">
              <label for="email" class="col-lg-4 control-label">Nomor Telfon : *<span class="require">*</span></label>
              <div class="col-lg-8">
                <input type="text" class="form-control" id="email">
              </div>
            </div>
            <div class="form-group">
              <label for="password" class="col-lg-4 control-label">Password <span class="require">*</span></label>
              <div class="col-lg-8">
                <input type="text" class="form-control" id="password">
              </div>
            </div>
            <div class="form-group">
              <label for="confirm-password" class="col-lg-4 control-label">Confirm password <span class="require">*</span></label>
              <div class="col-lg-8">
                <input type="text" class="form-control" id="confirm-password">
              </div>
            </div>
          </fieldset> 
        </div> 
        <div class="col-md-6 col-sm-6"> 
          <fieldset>
            <div class="form-group">
              <label for="email" class="col-lg-4 control-label">Email <span class="require">*</span></label>
              <div class="col-lg-8">
                <input type="text" class="form-control" id="email">
              </div>
            </div>
            <div class="form-group">
              <label for="password" class="col-lg-4 control-label">Password <span class="require">*</span></label>
              <div class="col-lg-8">
                <input type="text" class="form-control" id="password">
              </div>
            </div>
            <div class="form-group">
              <label for="confirm-password" class="col-lg-4 control-label">Confirm password <span class="require">*</span></label>
              <div class="col-lg-8">
                <input type="text" class="form-control" id="confirm-password">
              </div>
            </div>
          </fieldset> 
        </div> 
        <div class="col-md-12"> 
          <div class="row">
            <div class="col-lg-8 col-md-offset-4 padding-left-0 padding-top-20">                        
              <button type="submit" class="btn btn-primary">Create an account</button>
              <button type="button" class="btn btn-default">Cancel</button>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
<!-- END CONTENT -->
@endsection