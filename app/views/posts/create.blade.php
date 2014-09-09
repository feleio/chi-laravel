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
                array('class' => 'form-control rte-zone')) 
            }}
        </div>

        {{ Form::submit('Submit', array('class' => 'btn btn-primary')) }}
        {{ Form::reset('Reset', array('class' => 'btn btn-default')) }}

    {{ Form::close() }}
</div>
@stop

@section('css')
{{ HTML::style('js/lib/rte/rte.css') }}
@stop


@section('js')
{{ HTML::script('js/lib/rte/jquery.rte.js')}}
<script>
    $(".rte-zone").rte({
        content_css_url: "/js/lib/rte/rte-post.css",
        media_url: "/js/lib/rte/",
    });
</script>
@stop

