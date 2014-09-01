
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Upload photo</title>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">

    <!-- Optional theme -->
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap-theme.min.css">

    {{ HTML::style('css/m.css') }}

  <body>
    @if (Session::has('isSuccess'))
    <div class="alert alert-{{{Session::get('isSuccess') ? 'success' : 'danger'}}}" role="alert">
        {{{ Session::get('message') }}}
    </div>
    @endif

    {{ Form::open(array('url' => 'images', 'files' => True, 'role' => 'form')) }}
    <div class="form-group">
        {{ Form::label('file','File') }}
        {{ Form::file('image') }}
    </div>

    <button type="upload" class="btn btn-primary">Upload</button>
    <button type="reset" class="btn btn-default">Reset</button>
    {{ Form::close() }}

    <hr>

    @foreach ($images as $img)
    <div style="display: inline-block;">
        <p>{{$img->id.'.'.$img->type}}</p>
        <img src="{{asset('imgs/uploads/'.$img->id.'.'.$img->type)}}" class="img-thumbnail" style="width: auto; height: 200px; ">
    </div>
    @endforeach

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <!-- Latest compiled and minified JavaScript -->
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>

    {{ HTML::script('js/diary.js')}}
  </body>
</html>
