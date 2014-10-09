@extends('layouts.master')

@section('title', 'Send Message')

@section('content')
	@if (Session::has('isSuccess'))
 	<div class="alert alert-{{{Session::get('isSuccess') ? 'success' : 'danger'}}}" role="alert">
        {{{ Session::get('message') }}}
        {{ HTML::ul($errors->all()) }}
    </div>
    @endif
	{{ Form::open(array('url' => '/messages/send')) }}
		
		<div class="form-group">
			{{ Form::label('name', '你的名字') }}
			{{ Form::text('name', $savedName, array('class' => 'form-control')) }}
		</div>

		<div class="form-group">
			{{ Form::label('email', '你的email(optional)') }}
			{{ Form::email('email', $savedEmail, 
				array('class' => 'form-control')) }}
		</div>

		<div class="form-group">
			{{ Form::label('content', '內容') }}
			{{ Form::textarea('content', '', array('class' => 'form-control')) }}
		</div>

        {{ Form::submit('Submit', array('class' => 'btn btn-primary')) }}
        {{ Form::reset('Reset', array('class' => 'btn btn-default')) }}

	{{ Form::close() }}
@stop
