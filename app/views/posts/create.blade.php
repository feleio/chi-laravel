@extends('layouts.master')

@section('title', '寫日記')

@section('content')
<div class="container-content-padding">
    {{ HTML::ul($errors->all()) }}

    {{ Form::open(array('url' => 'posts')) }}

        <div class="form-group">
            {{ Form::label('title', 'Title') }}
            {{ 
                Form::text('title', Input::old('title'), 
                array('class' => 'form-control')) 
            }}
        </div>

        <div class="form-group">
            {{ Form::label('image_id', 'Title Image id') }}
            {{ 
                Form::text('image_id', Input::old('image_id'), 
                array('class' => 'form-control')) 
            }}
        </div>

        <div class="form-group">
            {{ Form::label('content', 'Content') }}
            {{ 
                Form::textarea('content', Input::old('content'), 
                array(  'class' => 'form-control',
                        'name' => 'content',
                        'id' => 'content',
                        'rows' => '10',
                        'cols' => '80' )) 
            }}
        </div>

        {{ Form::submit('Submit', array('class' => 'btn btn-primary')) }}
        {{ Form::reset('Reset', array('class' => 'btn btn-default')) }}

    {{ Form::close() }}
</div>
@stop

@section('head-css')
@stop

@section('head-js')
{{ HTML::script('ckeditor/ckeditor.js')}}
@stop

@section('end-js')
<script>
    CKEDITOR.replace('content');
    CKEDITOR.config.height = 500;

    $("#write-post").addClass("nav-active");
</script>
@stop

