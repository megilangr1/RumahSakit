@extends('dokter.layouts.master')

@section('content')
<div class="col-md-6">
    <h3>Selamat Datang <b><u>{{ auth()->user()->dokter->name }}</u></b></h3>
    
</div>
@endsection