<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>我的插畫</title>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">

    <!-- Optional theme -->
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap-theme.min.css">

    {{ HTML::style('css/m.css') }}

  <body>
    <div class="wrapper">
        <div class="container-header">
            <p class="pull-left" style="font-weight: bold">我的插畫</p>
            <p class="pull-right">
                <a href="#" class="nav-link">日記</a>
                <span>|</span>
                <a href="#" class="nav-link">畫作</a>
                <span>|</span>
                <a href="#" class="nav-link">聯絡我</a>
            </p>
        </div>
        <div class="wrapper-shadow">
            <div class="container-diary">
                @foreach ($posts as $post)
                <div class="container-post">
                    <div class="post">
                        <div class="post-title-img">
                            <img src="{{asset('imgs/uploads/'.$post->image->id.'.'.$post->image->type)}}" >
                        </div>
                        <div class="post-title">{{{trim($post->title)}}}</div>
                        <div class="post-content">
                            <?php $trimStr = trim($post->content); ?>
                            {{{mb_substr($trimStr,0,min(strlen($trimStr),130)).'...'}}}

                        </div>
                    </div>
                 </div>
                @endforeach
                <div id="columns-separator"></div>
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

    {{ HTML::script('js/diary.js')}}
  </body>
</html>
