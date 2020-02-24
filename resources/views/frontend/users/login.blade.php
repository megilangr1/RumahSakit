@extends('frontend.layouts.master')

@section('content') 

@include('frontend.layouts.sidebar')

<!-- BEGIN CONTENT -->
<div class="col-md-9 col-sm-9">
  <h3 align="center" class="margin-bottom-20">Silahkan Login Untuk Melakukan Daftar Rawat Jalan</h3>
  <hr>
  <div class="content-form-page">
		@if (auth()->check())
		<a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"> {{ __('Logout') }} </a>
		<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
				@csrf
		</form>
		@endif
    @if (session('mustVerif'))
    <div class="alert alert-success alert-dismissible" role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      {{ session('mustVerif') }}
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
			<form action="{{ route('user.log') }}" class="form-horizontal" role="form" method="POST">				
        @csrf  
				<div class="form-group">
					<label for="email" class="col-lg-4 control-label">Email <span class="require">*</span></label>
					<div class="col-lg-8">
						<input type="text" class="form-control" id="email" name="email" required autofocus>
					</div>
				</div>
				<div class="form-group">
					<label for="password" class="col-lg-4 control-label">Password <span class="require">*</span></label>
					<div class="col-lg-8">
						<input type="password" class="form-control" id="password" name="password">
					</div>
				</div>
				<div class="row">
					<div class="col-lg-8 col-md-offset-4 padding-left-0">
						<a href="page-forgotton-password.html">Forget Password?</a>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-3 col-md-offset-4 padding-left-0 padding-top-20">
						<button type="submit" class="btn btn-primary btn-block">Login</button>
					</div>
					<div class="col-lg-5 padding-left-0 padding-top-20">
						<a href="{{ route('user.register') }}" class="btn btn-default btn-block">
							Belum Punya Akun ? Klik Di-Sini Untuk Daftar
						</a>
					</div>
				</div>
      </form>
    </div>
  </div>
</div>
<!-- END CONTENT -->
@endsection