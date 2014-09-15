<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>@yield('title')</title>

        {{ HTML::style('css/m.css') }}
        @yield('head-css')
        @yield('head-js')
    </head>

    <body>
        <div class="wrapper">
            <div class="container-header">
                <p class="pull-left" style="font-weight: bold">我的插畫</p>
                <p class="pull-right">
                    <a href="{{URL::to('/posts')}}" id="diary" class="">日記</a>
                    <span>|</span>
                    <a href="#" id="artwork" class="">畫作</a>
                    <span>|</span>
                    <a href="#" id="email" class="">聯絡我</a>
                </p>
            </div>
            <div class="container-header">
                <p class="pull-right">
                    <a href="{{URL::to('/posts/create')}}" id="write-post" class="">
                        +寫日記
                    </a>
                    <span>|</span>
                    <a href="{{URL::to('/images')}}" id="upload" target="_blank" class="">
                        上載圖片
                    </a>
                    <span>|</span>
                    <a href="#" id="logout" class="">
                        登出
                    </a>
                </p>
            </div>
            <div class="wrapper-shadow">
                <div class="container-content">
                @yield('content')
                </div>
                <div class="container-footer">
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
