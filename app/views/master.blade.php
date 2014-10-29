<!DOCTYPE html>
<html>
<head>
    <title><?php if ( isset($title) ) print "{$title} - "; ?>Kinetic Supply Code Challenge</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    {{ HTML::style('vendor/bootstrap/dist/css/bootstrap.min.css') }}

{{-- Add extra CSS files, if provided --}}
@yield('header-css')

{{-- Add extra CSS code, if provided --}}
@yield('header-css-code')
</head>
<body>
    <header class="navbar navbar-inverse navbar-static-top">
        <div class="container-fluid">
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">

            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown">
                        <a class="dropdown-toggle" role="button" data-toggle="dropdown" href="#"><i class="glyphicon glyphicon-globe"></i> Countries <span class="caret"></span></a>
                        <ul id="g-account-menu" class="dropdown-menu" role="menu">
                            <li><a href="/country/add" class="text-right">Create New</a></li>
                            <li><a href="/countries" class="text-right">View All</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </header>

    <div class="container">
        @yield('main')
    </div>

    {{ HTML::script('/vendor/jquery/dist/jquery.min.js') }}
    {{ HTML::script('/vendor/bootstrap/dist/js/bootstrap.js') }}
{{-- Add Extra Javascript, if provided --}}
@yield('footer-js')

{{-- Add Extra Javascript Code, if provided --}}
@yield('footer-js-code')
</body>
</html>
