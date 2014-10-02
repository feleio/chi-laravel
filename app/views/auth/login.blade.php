@extends('layouts.master')

@section('title', 'login')

@section('content')
	@if (Input::old('isFailed',false))
	<div>Login failed</div>
	@endif
	{{ Form::open(array('url' => 'auth/login'))}}

	<div class="form-group">
		{{ Form::label('name', 'Name') }}
		{{ Form::text('name', 'chi', array('class' => 'form-control')) }}
	</div>

	<div class="form-group">
		{{ Form::label('password', 'Password') }}
		{{ Form::password('password', array('class' => 'form-control')) }}
	</div>

	{{ Form::submit('Login', array('class', 'btn btn-primary')) }}

	{{ Form::close() }}
@stop
