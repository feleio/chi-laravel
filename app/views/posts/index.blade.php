@extends('layouts.master')

@section('title', '我的插畫')

@section('content')

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
@stop

@section('end-js')
{{ HTML::script('js/diary.js')}}

<script>
    $("#diary").addClass("nav-active");
</script>
@stop