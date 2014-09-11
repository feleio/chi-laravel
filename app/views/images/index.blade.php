@extends('layouts.master')

@section('title', 'Image upload')

@section('content')
<div class="container-content-padding">
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
    <div class="container-image">
    <div>
            <?php $imgPath = "/imgs/uploads/".$img->id.'.'.$img->type; ?>
            <span>{{$imgPath}}</span>
            <button class="copy-button btn btn-xs btn-info" data-clipboard-text="{{$imgPath}}">Copy</button>
            
        </div>
        <img src="{{asset('imgs/uploads/'.$img->id.'.'.$img->type)}}" class="img-thumbnail" style="width: auto; height: 200px; ">

    </div>
    @endforeach

    <div>
        {{$images->links()}}
    </div>

@stop

@section('end-js')
{{ HTML::script('js/lib/zeroclipboard/ZeroClipboard.min.js')}}

<script>
    $(document).ready(function() {
        ZeroClipboard.config({swfPath: "/js/lib/zeroclipboard/ZeroClipboard.swf"});
        var clip = new ZeroClipboard($(".copy-button"));
    });

    $("#upload").addClass("nav-active");
</script>

@stop
