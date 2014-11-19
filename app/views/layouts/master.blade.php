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
        {{ HTML::style('//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css')}}
        @yield('head-css')
        @yield('head-js')
        @if(!App::isLocal())
        <script>
          (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
          (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
          m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
          })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

          ga('create', 'UA-56421171-1', 'auto');
          ga('send', 'pageview');
        </script>
        @endif
    </head>

    <body>
        <div class="c-admin c-center">
            @if (Auth::check())
            <div class="f_right">
                <span>{{$mailsCount}} mails</span>
                <span>{{$requestsCount}} postcard</span>
                <a class="btn btn-primary btn-xs" href="{{URL::to('posts/create')}}">
                    write
                </a>
                <a class="btn btn-primary btn-xs" href="{{URL::to('images')}}">
                    upload
                </a>
                <a class="btn btn-danger btn-xs" href="{{URL::to('auth/logout')}}">
                    logout
                </a>
            </div>
            @endif
        </div>
        <div class="c-header">
            <div class="c-center c-header-height">
                <div class="header-bar-c-links f_left">
                    <div class="header-bar-link c-inline">
                        <a href="{{URL::to('artworks')}}">ARTWORK</a>
                    </div>
                    <div class="header-bar-link c-inline">
                        <a href="{{URL::to('posts')}}">BLOG</a>
                    </div>
                </div>
                <div class="header-bar-c-center f_left"></div>
                <div class="header-bar-c-links f_left">
                    <div class="header-bar-link c-inline">
                        <a href="{{URL::to('aboutme')}}">ABOUT</a>
                    </div>
                    <div class="header-bar-link c-inline">
                        <a href="{{URL::to('messages/send')}}">EMAIL ME</a>
                    </div>
                </div>
                <div class="header-bar-logo">
                    <a href="{{URL::to('/')}}">
                        <img src="/imgs/header_logo.png" alt=""></img>
                    </a>
                </div>
            </div>
        </div>
        <div class="c-content c-center">
            @yield('content')
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
