<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>@yield('title')</title>

        {{ HTML::style('css/master.css') }}
        @yield('head-css')
        @yield('head-js')
    </head>

    <body>
        <div class="c-header">
            <div class="c-center c-header-height">
                <div class="header-bar-c-links f_left">
                    <div class="header-bar-link c-inline">ARTWORK</div>
                    <div class="header-bar-link c-inline">BLOG</div>
                </div>
                <div class="header-bar-c-center f_left"></div>
                <div class="header-bar-c-links f_left">
                    <div class="header-bar-link c-inline">ABOUT</div>
                    <div class="header-bar-link c-inline">EMAIL ME</div>
                </div>
                <div class="header-bar-logo">
                    <img src="/imgs/header_logo2.png" alt="">
                    </img>
                </div>
            </div>
        </div>

        <!-- Bootstrap core JavaScript
        ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <!-- Latest compiled and minified JavaScript -->
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>

        @yield('end-js')
    </body>
</html>
