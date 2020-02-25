@extends('frontend.layouts.master')

@section('content')
@include('frontend.layouts.sidebar')


<div class="col-md-9 col-sm-9">
    <h3 align="center" class="margin-bottom-20">Hi, {{ auth()->user()->pasien->name }}</h3>
		<hr>
		<div class="content-form-page">
			<h4 align="center">Selamat Datang di-Dashboard Pasien</h4>
		</div>
</div>
@endsection
