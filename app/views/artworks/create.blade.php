@extends('layouts.master')

@section('title', 'Create Artworks')

@section('content')	
    @if (Session::has('isSuccess'))
    <div class="alert alert-{{{Session::get('isSuccess') ? 'success' : 'danger'}}}" role="alert">
        {{{ Session::get('message') }}}
    </div>
    @endif
    
	{{ Form::open(array('url' => 'artworks')) }}
		<div class="form-group">
			{{ Form::label('base_like_count', 'Base Like Count')}}
			{{ 
                Form::text('base_like_count', Input::old('base_like_count'), 
                array('class' => 'form-control')) 
            }}
		</div>
		<div class="form-group">
			{{ Form::label('image_id', 'Image Id')}}
			{{ 
                Form::text('image_id', Input::old('image_id'), 
                array('class' => 'form-control')) 
            }}
		</div>

        {{ Form::submit('Submit', array('class' => 'btn btn-primary')) }}
        {{ Form::reset('Reset', array('class' => 'btn btn-default')) }}
	{{ Form::close() }}
@stop