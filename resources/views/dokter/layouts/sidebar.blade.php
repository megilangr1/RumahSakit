<div class="page-sidebar-wrapper">
	<div class="page-sidebar navbar-collapse collapse">
		<ul class="page-sidebar-menu " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
			<li class="start">
					<a href="{{ route('dokter.index') }}"><i class="fa fa-home"></i> <span class="title"> Halaman Utama </span></a>
			</li>
			<li class="active">
				<a href="javascript:;">
					<i class="icon-home"></i>
					<span class="title">Dokter Menu</span>
					<span class="selected"></span>
					<span class="arrow open"></span>
				</a>
				<ul class="sub-menu">
					<li class="{{ Request::is('admin/roles*') ? 'active':'' }}">
						<a href="{{ route('roles.index') }}">Riwayat Pemeriksaan Pasien</a>
					</li>
				</ul>
			</li>
		</ul>
	</div>
</div>