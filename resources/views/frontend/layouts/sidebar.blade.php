<!-- BEGIN SIDEBAR -->
<div class="sidebar col-md-3 col-sm-3">
	<ul class="list-group margin-bottom-25 sidebar-menu">
		@if (auth()->check())
		<li class="list-group-item clearfix"><a href="#"><i class="fa fa-angle-right"></i> Data Diri</a></li>		
		<li class="list-group-item clearfix"><a href="{{ route('rawat.jalan') }}"><i class="fa fa-angle-right"></i> Daftar Rawat Jalan</a></li>		
		<li class="list-group-item clearfix"><a href="{{ route('list.rawat.jalan') }}"><i class="fa fa-angle-right"></i> Pendaftaran di-Buat</a></li>		
		<li class="list-group-item clearfix"><a href="{{ route('user.register') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fa fa-angle-right"></i> Logout</a></li>		
		<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
				@csrf
		</form>
		@else
		<li class="list-group-item clearfix"><a href="{{ route('user.register') }}"><i class="fa fa-angle-right"></i> Daftar</a></li>
		<li class="list-group-item clearfix"><a href="{{ route('user.login') }}"><i class="fa fa-angle-right"></i> Login</a></li>		
		@endif
	</ul>
</div>
<!-- END SIDEBAR -->