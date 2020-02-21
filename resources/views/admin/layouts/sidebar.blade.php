<div class="page-sidebar-wrapper">
		<div class="page-sidebar navbar-collapse collapse">
				<ul class="page-sidebar-menu " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
						<li class="start {{ Request::is('admin') ? 'active':'' }}">
								<a href="{{ route('admin.index') }}"><i class="fa fa-home"></i> <span class="title"> Halaman Utama </span></a>
						</li>
						<li class="{{ Request::is('admin/roles*') ? 'active':'' }}">
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
										<li>
												<a href="#"> <i class="fa fa-cogs"></i> New Dashboard #1</a>
										</li>
								</ul>
						</li>
						<li class="last ">
								<a href="{{ route('admin.index') }}"><i class="fa fa-home"></i> <span class="title">Last Side Bar</span></a>
						</li>
				</ul>
		</div>
</div>