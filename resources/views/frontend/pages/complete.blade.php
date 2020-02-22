@extends('frontend.layouts.master')

@section('content')
  
<div class="col-md-12 col-sm-12">
  <div class="content-page page-404"> 
    <div class="number">
      Sukses !
    </div>
    <div class="details">
        <h3>E-Mail Berhasil di-Verifikasi</h3>
        <p>
          Silahkan Login Untuk Melanjutkan.<br>
          <a href="{{ route('user.login') }}" class="link">Klik Di-Sini Untuk Login</a>
        </p>
    </div>
  </div>
</div>
@endsection