<!doctype html>

<html>
<head>
	<meta charset="UTF-8">
	<title>Create user</title>
	<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
</head>
<body>

{{ HTML::ul($errors->all()) }}

{{ Form::open(array('url' => 'users'))}}
	<div class="form-group">
		{{ Form::label('name', 'Name') }}
		{{ Form::text('name', Input::old('name'), array('class' => 'form-control')) }}
	</div>

	<div class="form-group">
		{{ Form::label('password', 'Password') }}
		{{ Form::password('password', array('class' => 'form-control')) }}
	</div>

	{{ Form::submit('Create a User', array('class' => 'btn btn-primary'))}}

{{ Form::close() }}