<!DOCTYPE html>
<html class="bg-black">
	<head>
		<!-- Basic Page Needs
		================================================== -->
		<meta charset="utf-8" />
		<title>
			@section('title')
			Advocate Business Portal
			@show
		</title>

		<!-- Mobile Specific Metas
		================================================== -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<!-- CSS
		================================================== -->
        <!-- bootstrap 3.0.2 -->
        {{ HTML::style('packages/bootstrap/css/bootstrap.min.css') }}        
        <!-- font Awesome -->
        {{ HTML::style('assets/css/font-awesome.css') }}
        <!-- Font Styles -->
        {{ HTML::style('assets/css/fonts.css') }}
        <!-- Theme style -->
        {{ HTML::style('assets/css/AdminLTE.css') }} 

		<style>
		@section('styles')
		@show
		</style>

		<!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
		<!--[if lt IE 9]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->

		<!-- Favicons
		================================================== -->
		<link rel="shortcut icon" href="{{{ asset('assets/ico/favicon.jpeg') }}}">
	</head>

	<body>
		<div class="container">
			<!-- Notifications -->
			@include('notifications')
			<!-- ./ notifications -->
		</div>

		<!-- Content -->
		@yield('content')
		<!-- ./ content -->

		<!-- Javascripts
		================================================== -->
        {{ HTML::script('packages/bootstrap/js/jquery-1.10.2.min.js') }}
        {{ HTML::script('packages/bootstrap/js/bootstrap.min.js') }}
        {{ HTML::script('assets/js/app.js') }}
        

	</body>
</html>
