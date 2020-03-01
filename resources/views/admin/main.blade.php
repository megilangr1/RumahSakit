@extends('admin.layouts.master')

@section('content')
<div class="col-md-12">
	@foreach ($roles as $r)
		<h3>Selamat Datang <span class="uppercase">{{ $r->name }}</span> <b><u>{{ auth()->user()->admin->name }}</u></b></h3>
	@endforeach
</div>
@endsection