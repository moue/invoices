<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Lampoon | Dashboard</title>
        <meta name="publishable-key" content="{{ Config::get('stripe.publishable_key') }}">
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <link rel="icon" type="image/jpeg" href="img/logo.jpeg"/>
        <!-- bootstrap 3.0.2 -->
        {{ HTML::style('packages/bootstrap/css/bootstrap.min.css') }}        
        <!-- Icon Styles -->
        {{ HTML::style('css/font-awesome.css') }}
        {{ HTML::style('css/ionicons.min.css')}}
        <!-- Font Styles -->
        {{ HTML::style('css/fonts.css') }}
        <!-- Theme style -->
        {{ HTML::style('css/AdminLTE.css') }} 
        
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
    </head>
    <body class="skin-black">
        <!-- header logo: style can be found in header.less -->
        <header class="header">
            <a href="/" class="logo">
                <!-- Add the class icon to your logo image or logo icon to add the margining -->
                Lampoon
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
                                <li><a href="/admin/invoice/create" style="margin-left: 10px;">
                                    <h4><i class="fa fa-angle-double-right"></i> Create Invoice</h4></a></li>
                            </ul>
                        </li>
                        <li class="treeview">
                            <a href="/admin/advertiser">
                                <h4><i class="fa fa-envelope-o"></i>
                                Advertisers
                                <i class="fa fa-angle-left pull-right"></i></h4>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="/admin/advertiser/create" style="margin-left: 10px;">
                                    <h4><i class="fa fa-angle-double-right"></i> Add Advertiser</h4></a></li>
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
                                <h4><i class="fa fa-user"></i> Settings</h4>
                            </a>
                        </li>
                    </ul>
                </section>
                <!-- /.sidebar -->
            </aside>

            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">                
                <div class="container">
                    @if(Session::has('message'))
                        <p class="alert alert-danger">{{ Session::get('message') }}</p>
                    @elseif(Session::has('notification'))
                        <p class="alert alert-success">{{ Session::get('notification') }}</p>
                    @endif
                </div>

                 @yield('content')

            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->



        <!-- jQuery 1.10.2 -->
        {{ HTML::script('packages/bootstrap/js/jquery-1.10.2.min.js') }}
        <!-- Bootstrap -->
        {{ HTML::script('packages/bootstrap/js/bootstrap.min.js') }}
        <!-- AdminLTE App -->
        {{ HTML::script('js/app.js') }}
        <script type="text/javascript" src="https://js.stripe.com/v2/"></script>
        
        @yield('footer')
    </body>
</html>