<div class="page-sidebar-wrapper">
		<div class="page-sidebar navbar-collapse collapse">
			<ul class="page-sidebar-menu " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
				<li class="start {{ Request::is('operator') ? 'active':'' }}">
						<a href="{{ route('operator.index') }}"><i class="fa fa-home"></i> <span class="title"> Halaman Utama </span></a>
				</li>
				<li class="{{ Request::is('operator/pendaftaran*') ? 'active':'' }}">
					<a href="javascript:;">
						<i class="icon-home"></i>
						<span class="title">Operator Menu</span>
						<span class="selected"></span>
						<span class="arrow open"></span>
					</a>
					<ul class="sub-menu">
						<li class="{{ Request::is('operator/pendaftaran*') ? 'active':'' }}">
							<a href="{{ route('operator.regist') }}"> <i class="fa fa-cogs"></i> Pendaftaran Rawat Jalan</a>
						</li>
					</ul>
				</li>
			</ul>
		</div>
	</div>