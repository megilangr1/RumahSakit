<div class="page-sidebar-wrapper">
	<div class="page-sidebar navbar-collapse collapse">
		<ul class="page-sidebar-menu " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
			<li class="start {{ Request::is('admin') ? 'active':'' }}">
					<a href="{{ route('admin.index') }}"><i class="fa fa-home"></i> <span class="title"> Halaman Utama </span></a>
			</li>
			<li class="{{ Request::is('admin/roles*'|| 'admin/services*') ? 'active':'' }}">
				<a href="javascript:;">
					<i class="icon-home"></i>
					<span class="title">Admin Menu</span>
					<span class="selected"></span>
					<span class="arrow open"></span>
				</a>
				<ul class="sub-menu">
					<li class="{{ Request::is('admin/roles*') ? 'active':'' }}">
						<a href="{{ route('roles.index') }}"> <i class="fa fa-cogs"></i> Manajemen Roles</a>
					</li>
					<li class="{{ Request::is('admin/services*') ? 'active':'' }}">
						<a href="{{ route('services.index') }}"> <i class="fa fa-cogs"></i> Manajemen Poli</a>
					</li>
					<li class="{{ Request::is('admin/doctors*') ? 'active':'' }}">
						<a href="{{ route('doctors.index') }}"> <i class="fa fa-cogs"></i> Manajemen Dokter</a>
					</li>
<<<<<<< HEAD
					<li class="{{ Request::is('admin/patients*') ? 'active':'' }}">
						<a href="{{ route('patients.index') }}"> <i class="fa fa-cogs"></i> Manajemen Pasien</a>
					</li>
					<li>
						<a href="#"> <i class="fa fa-cogs"></i> New Dashboard #1</a>
=======
					</li>
					<li class="{{ Request::is('admin/operators*') ? 'active':'' }}">
						<a href="{{ route('operators.index') }}"> <i class="fa fa-cogs"></i> Manajemen Operator</a>
>>>>>>> 7489907f49fb514061ba2877c6b22b203e3304c4
					</li>
				</ul>
			</li>
			<li class="last ">
					<a href="{{ route('admin.index') }}"><i class="fa fa-home"></i> <span class="title">Last Side Bar</span></a>
			</li>
		</ul>
	</div>
</div>