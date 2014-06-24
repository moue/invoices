<!DOCTYPE html>
<html class="bg-black">
    <head>
        <meta charset="UTF-8">
        <title>@yield('title') | The Harvard Advocate</title>
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

        @yield('styles')
    </head>

    <body class="bg-black">
        
        <div class="container">
            @if(Session::has('message'))
                <p class="alert alert-danger">{{ Session::get('message') }}</p>
            @endif

            
        </div>
        
        @yield('content')


         <!-- Javascripts -->
        <script src="https://js.stripe.com/v2/"></script>
        <!-- jQuery 2.0.2 -->
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>

        {{ HTML::script('assets/js/bootstrap.min.js') }}
        {{ HTML::script('assets/js/billing.js') }}

    </body>
</html>