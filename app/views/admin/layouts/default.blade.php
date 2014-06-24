<!DOCTYPE html>

<html lang="en">

<head id="Starter-Site">

	<meta charset="UTF-8">

	<!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame -->
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

	<title>
		@section('title')
			Administration
		@show
	</title>

	<meta name="keywords" content="@yield('keywords')" />
	<meta name="author" content="@yield('author')" />
	<!-- Google will often use this as its description of your page/site. Make it good. -->
	<meta name="description" content="@yield('description')" />

	<!-- Speaking of Google, don't forget to set your site up: http://google.com/webmasters -->
	<meta name="google-site-verification" content="">

	<!-- Dublin Core Metadata : http://dublincore.org/ -->
	<meta name="DC.title" content="Project Name">
	<meta name="DC.subject" content="@yield('description')">
	<meta name="DC.creator" content="@yield('author')">

	<!--  Mobile Viewport Fix -->
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

	<!-- This is the traditional favicon.
	 - size: 16x16 or 32x32
	 - transparency is OK
	 - see wikipedia for info on browser support: http://mky.be/favicon/ -->
	<link rel="shortcut icon" href="{{{ asset('assets/ico/favicon.png') }}}">

	<!-- iOS favicons. -->
	<link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{{ asset('assets/ico/apple-touch-icon-144-precomposed.png') }}}">
	<link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{{ asset('assets/ico/apple-touch-icon-114-precomposed.png') }}}">
	<link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{{ asset('assets/ico/apple-touch-icon-72-precomposed.png') }}}">
	<link rel="apple-touch-icon-precomposed" href="{{{ asset('assets/ico/apple-touch-icon-57-precomposed.png') }}}">

	<!-- CSS -->
    <!--<link href="../../css/bootstrap.min.css" rel="stylesheet" type="text/css" />-->
    <!-- font Awesome 
    <link href="../../css/font-awesome.min.css" rel="stylesheet" type="text/css" />-->
    <!-- Ionicons 
    <link href="../../css/ionicons.min.css" rel="stylesheet" type="text/css" />-->
    <!-- DATA TABLES 
    <link href="../../css/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />-->
    
    <!-- Theme style 
    <link href="../../css/AdminLTE.css" rel="stylesheet" type="text/css" />-->
    <!--<link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap-theme.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/wysihtml5/prettify.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/wysihtml5/bootstrap-wysihtml5.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/datatables-bootstrap.css')}}">-->
    {{ HTML::style('packages/bootstrap/css/bootstrap.min.css') }}        
    <!-- Icon Styles -->
    {{ HTML::style('assets/css/font-awesome.css') }}
    {{ HTML::style('assets/css/ionicons.min.css')}}
    <!-- Font Styles -->
    {{ HTML::style('assets/css/fonts.css') }}
    <!-- Theme style -->
    {{ HTML::style('assets/css/AdminLTE.css') }} 
        <!-- Datatables style -->
    {{ HTML::style('assets/compiled/site.css') }}

	@yield('styles')

	<!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
	<!--[if lt IE 9]>
	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->

</head>

<body class="skin-black">
    <!-- header logo: style can be found in header.less -->
    <header class="header">
        <a href="/" class="logo">
            <!-- Add the class icon to your logo image or logo icon to add the margining -->
            Advocate
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
            <!-- Sidebar toggle button-->
            <a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </a>
            <div class="navbar-right">
                <ul class="nav navbar-nav">
                @if(Auth::check())
                    <li>
                        <p style="padding:15px;"><i class="glyphicon glyphicon-user"></i> Hello {{ Auth::user()->email }}</p>
                    </li>
                    <li>{{ HTML::link('user/logout', 'Logout') }}</li>
                @endif
                </ul>
            </div>
        </nav>
    </header>
    <div class="wrapper row-offcanvas row-offcanvas-left">
        <!-- Left side column. contains the logo and sidebar -->
        <aside class="left-side sidebar-offcanvas">                
            <!-- sidebar: style can be found in sidebar.less -->
            <section class="sidebar">
                <!-- sidebar menu: : style can be found in sidebar.less -->
                <ul class="sidebar-menu">
                    @if (Auth::check())
                    @if (Auth::user()->hasRole('admin'))
                    
                    
                    <li>
                        <a href="/">
                            <h4><i class="fa fa-laptop"></i> Dashboard</h4>
                        </a>
                    </li>
                    <li class="treeview">
                        <a href="/admin/invoice">
                            <h4><i class="fa fa-credit-card"></i>
                            Invoices
                            <i class="fa fa-angle-left pull-right"></i></h4>
                        </a>
                        <ul class="treeview-menu">
                            <li>
                                <a href="/admin/invoice" style="margin-left: 10px;">
                                    <h5><i class="fa fa-angle-double-right"></i> View Invoices</h5>
                                </a>
                            </li>
                            <li>
                                <a href="/admin/invoice/create" style="margin-left: 10px;">
                                    <h5><i class="fa fa-angle-double-right"></i> Create Invoice</h5>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="treeview">
                        <a href="/admin/advertiser">
                            <h4><i class="fa fa-envelope-o"></i>
                            Advertisers
                            <i class="fa fa-angle-left pull-right"></i></h4>
                        </a>
                        <ul class="treeview-menu">
                            <li>
                                <a href="/admin/advertiser/" style="margin-left: 10px;">
                                    <h5><i class="fa fa-angle-double-right"></i> View Advertisers</h5>
                                </a>
                            </li>
                            <li>
                                <a href="/admin/advertiser/create" style="margin-left: 10px;">
                                    <h5><i class="fa fa-angle-double-right"></i> Add Advertiser</h5>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="/admin/users">
                            <h4><i class="fa fa-user"></i> Manage Users</h4>
                        </a>
                    </li>
                    <li>
                        <a href="/admin/roles">
                            <h4><i class="fa fa-group"></i> Manage Roles</h4>
                        </a>
                    </li>

                    @else
                   

                    <li>
                        <a href="/user">
                            <h4><i class="fa fa-credit-card"></i> View Invoices</h4>
                        </a>
                    </li>
                    <!--<li>
                        <a href="/user/invoices">
                            <h4><i class="fa fa-folder-open"></i> View Ads</h4>
                        </a>
                    </li>-->
                    
                    
                    <!--<li>
                        <a href="/user/help">
                            <h4><i class="fa fa-group"></i> Contact Us</h4>
                        </a>
                    </li>-->
                    @endif
                    @endif
                    <li>
                        <a href="/user/settings">
                            <h4><i class="fa fa-gear"></i> Settings</h4>
                        </a>
                    </li>
                </ul>
            </section>
            <!-- /.sidebar -->
        </aside>

        <!-- Right side column. Contains the navbar and content of the page -->
        <aside class="right-side">
         	<div class="container">
                <!-- Notifications -->
				@include('notifications')
				<!-- ./ notifications -->
            </div>

			<!-- Content -->
			@yield('content')
			<!-- ./ content -->

			<!-- Footer -->
			<footer class="clearfix">
				@yield('footer')
			</footer>
			<!-- ./ Footer -->

		</aside><!-- /.right-side -->
    </div><!-- ./wrapper -->


 	<!-- jQuery 2.0.2 -->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
    <!-- Bootstrap 
    <script src="../../js/bootstrap.min.js" type="text/javascript"></script>-->
    {{ HTML::script('assets/js/bootstrap.min.js') }}
    <!-- DATA TABES SCRIPT
    <script src="../../js/plugins/datatables/jquery.dataTables.js" type="text/javascript"></script>
    <script src="../../js/plugins/datatables/dataTables.bootstrap.js" type="text/javascript"></script>-->
    {{ HTML::script('assets/js/datatables/jquery.dataTables.js') }}
    {{ HTML::script('assets/js/datatables/dataTables.bootstrap.js') }}
    {{ HTML::script('assets/js/jquery.colorbox.js') }}
    <!-- AdminLTE App 
    <script src="../../js/AdminLTE/app.js" type="text/javascript"></script>-->
    {{ HTML::script('assets/js/app.js') }}

    @yield('scripts')

</body>

</html>