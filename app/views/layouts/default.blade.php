<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>@yield('title') | Advocate Business Portal</title>
        <meta name="publishable-key" content="{{ Config::get('stripe.publishable_key') }}">
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <link rel="icon" type="image/jpeg" href="img/favicon.ico"/>
        <!-- bootstrap 3.0.2 -->
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
                @include('layouts.partials.sidebar')
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

        <!-- Javascripts -->
        <script src="https://js.stripe.com/v2/"></script>
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
        {{ HTML::script('assets/js/billing.js') }}

        @yield('footer')
        @yield('scripts')
    </body>
</html>