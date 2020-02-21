<!DOCTYPE html>
<html lang="en" class="no-js">
<head>
    <meta charset="utf-8" />
    <title>Aplikasi Pendaftaran Pasien - Rumah Sakit Bhayangkara</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <meta content="" name="description" />
		<meta content="" name="author" />
		<script src="{{ asset('') }}other/pace/pace.min.js"></script>
    <link href="{{ asset('') }}other/pace/pace.css" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet"
		type="text/css" />
    <link href="{{ asset('') }}assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('') }}assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('') }}assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('') }}assets/global/plugins/uniform/css/uniform.default.css" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('') }}assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('') }}assets/global/plugins/bootstrap-daterangepicker/daterangepicker-bs3.css" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('') }}assets/global/plugins/fullcalendar/fullcalendar.min.css" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('') }}assets/global/plugins/jqvmap/jqvmap/jqvmap.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset('') }}assets/admin/pages/css/tasks.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset('') }}assets/global/css/components.css" id="style_components" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('') }}assets/global/css/plugins.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset('') }}assets/admin/layout/css/layout.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset('') }}assets/admin/layout/css/themes/darkblue.css" rel="stylesheet" type="text/css"
        id="style_color" />
    <link href="{{ asset('') }}assets/admin/layout/css/custom.css" rel="stylesheet" type="text/css" />
		<link rel="shortcut icon" href="favicon.ico" />
</head>

<body class="page-header-fixed page-quick-sidebar-over-content page-sidebar-closed-hide-logo page-container-bg-solid">
    <div class="page-header -i navbar navbar-fixed-top">
        <div class="page-header-inner">
            <div class="page-logo">
                <a href="index.html">
                    <img src="{{ asset('') }}assets/admin/layout/img/logo.png" alt="logo" class="logo-default" />
                </a>
                <div class="menu-toggler sidebar-toggler hide">
                </div>
            </div>
            <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse"
                data-target=".navbar-collapse">
            </a>
            <div class="top-menu">
                <ul class="nav navbar-nav pull-right">
                    <li class="dropdown dropdown-user">
                        <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown"
                            data-close-others="true">
                            {{-- <img alt="" class="img-circle" src="{{ asset('') }}assets/admin/layout/img/avatar3_small.jpg" /> --}}
                            <img alt="" class="img-circle" src="{{ asset('') }}images/user-no-image.jpg" />
                            <span class="username username-hide-on-mobile"> &ensp; {{ auth()->user()->admin->name }}</span>
                            <i class="fa fa-angle-down"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-default">
                            <li>
                                <a href="extra_profile.html">
                                    <i class="icon-user"></i> My Profile </a>
                            </li>
                            <li>
                                <a href="{{ route('logout') }}"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i
                                        class="icon-key"></i> Log Out </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="post"
                                    style="display: none;">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="clearfix">
    </div>
    <div class="page-container">
				@include('admin.layouts.sidebar')

				<div class="page-content-wrapper">
            <div class="page-content">
                <div class="page-bar">
                    <ul class="page-breadcrumb">
                        <li>
                            <i class="fa fa-home"></i>
														<a href="javascript:void(0)">Admin</a>
														<i class="fa fa-angle-right"></i>
												</li>												
                        <li>
                            <a href="{{ route('admin.index') }}">Halaman Utama</a>
                        </li>
                    </ul>
                </div>
                <h3 class="page-title"> @yield('title') <small>@yield('small-title')</small> </h3>
                <div class="row">
									@yield('content')
                </div>
                <div class="clearfix">
                </div>
            </div>
        </div>
    </div>
    <div class="page-footer" style="border-top: 1px solid #b3b3b3;">
        <div class="page-footer-inner text-right">
            2020 &copy; Based on Program.
        </div>
        <div class="scroll-to-top">
            <i class="icon-arrow-up"></i>
        </div>
		</div>
		<script>
			paceOptions = {
				elements: {
					selectors: ['.page-header']
				}
			}
		</script>
    <script src="{{ asset('') }}assets/global/plugins/jquery.min.js" type="text/javascript"></script>
    <script src="{{ asset('') }}assets/global/plugins/jquery-migrate.min.js" type="text/javascript"></script>
    <script src="{{ asset('') }}assets/global/plugins/jquery-ui/jquery-ui.min.js" type="text/javascript"></script>
    <script src="{{ asset('') }}assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="{{ asset('') }}assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js"
        type="text/javascript"></script>
    <script src="{{ asset('') }}assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js"
        type="text/javascript">
    </script>
    <script src="{{ asset('') }}assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
    <script src="{{ asset('') }}assets/global/plugins/jquery.cokie.min.js" type="text/javascript"></script>
    <script src="{{ asset('') }}assets/global/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
    <script src="{{ asset('') }}assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js"
        type="text/javascript">
    </script>
    <script src="{{ asset('') }}assets/global/plugins/jqvmap/jqvmap/jquery.vmap.js" type="text/javascript"></script>
    <script src="{{ asset('') }}assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.russia.js" type="text/javascript">
    </script>
    <script src="{{ asset('') }}assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.world.js" type="text/javascript">
    </script>
    <script src="{{ asset('') }}assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.europe.js" type="text/javascript">
    </script>
    <script src="{{ asset('') }}assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.germany.js" type="text/javascript">
    </script>
    <script src="{{ asset('') }}assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.usa.js" type="text/javascript">
    </script>
    <script src="{{ asset('') }}assets/global/plugins/jqvmap/jqvmap/data/jquery.vmap.sampledata.js"
        type="text/javascript">
    </script>
    <script src="{{ asset('') }}assets/global/plugins/flot/jquery.flot.min.js" type="text/javascript"></script>
    <script src="{{ asset('') }}assets/global/plugins/flot/jquery.flot.resize.min.js" type="text/javascript"></script>
    <script src="{{ asset('') }}assets/global/plugins/flot/jquery.flot.categories.min.js" type="text/javascript">
    </script>
    <script src="{{ asset('') }}assets/global/plugins/jquery.pulsate.min.js" type="text/javascript"></script>
    <script src="{{ asset('') }}assets/global/plugins/bootstrap-daterangepicker/moment.min.js" type="text/javascript">
    </script>
    <script src="{{ asset('') }}assets/global/plugins/bootstrap-daterangepicker/daterangepicker.js"
        type="text/javascript">
    </script>
    <script src="{{ asset('') }}assets/global/plugins/fullcalendar/fullcalendar.min.js" type="text/javascript"></script>
    <script src="{{ asset('') }}assets/global/plugins/jquery-easypiechart/jquery.easypiechart.min.js"
        type="text/javascript">
    </script>
    <script src="{{ asset('') }}assets/global/plugins/jquery.sparkline.min.js" type="text/javascript"></script>
    <script src="{{ asset('') }}assets/global/scripts/metronic.js" type="text/javascript"></script>
    <script src="{{ asset('') }}assets/admin/layout/scripts/layout.js" type="text/javascript"></script>
    <script src="{{ asset('') }}assets/admin/layout/scripts/quick-sidebar.js" type="text/javascript"></script>
    <script src="{{ asset('') }}assets/admin/layout/scripts/demo.js" type="text/javascript"></script>
    <script src="{{ asset('') }}assets/admin/pages/scripts/index.js" type="text/javascript"></script>
    <script src="{{ asset('') }}assets/admin/pages/scripts/tasks.js" type="text/javascript"></script>
    <script>
        jQuery(document).ready(function () {
            Metronic.init(); // init metronic core componets	
            Layout.init(); // init layout
            QuickSidebar.init(); // init quick sidebar
            Demo.init(); // init demo features
            Index.init();
            Index.initDashboardDaterange();
            Tasks.initDashboardWidget();
        });

    </script>
</body>

</html>
