@extends('layouts.master')

@section('title', '我的插畫')

@section('content')

@foreach ($posts as $post)
<div class="c-post">
    <div class="post">  
        <?php $postLink = URL::to('posts/'.$post->id); ?>

        <a href="{{$postLink}}">
            <div class="post-title-img">
                    <img src="{{asset('imgs/uploads/'.$post->image->id.'.'.$post->image->type)}}" >
            </div>
        </a>
        <a href="{{$postLink}}">
            <div class="post-title">
                {{{trim($post->title)}}}
            </div>
        </a>
        <a href="{{$postLink}}">
            <div class="post-content">
                    <?php $trimStr = strip_tags(trim($post->content)); ?>
                    {{{mb_substr($trimStr,0,min(strlen($trimStr),130)).'...'}}}
            </div>
        </a>
        <div class="post-continue">
            <a href="{{$postLink}}">繼續閱讀</a>
        </div>
        <div class="f_right">
            <div class="post-function f_left">
                <i class="fa fa-heart"></i>
                <span>{{ $post->like_count + $post->base_like_count }}</span>
            </div>
<!--             <div class="post-function f_left">
    <i class="fa fa-comment"></i>
    <span>0</span>
</div> -->
            <div class="post-function f_left">
                <i class="fa fa-eye"></i>
                <span>{{ $post->seen_count }}</span>
            </div>
        </div>
        <div class="post-footer">
            {{$post->created_at}}
        </div>
    </div>
 </div>
@endforeach
<div id="columns-separator"></div>
@stop

@section('head-css')
{{ HTML::style('css/posts.index.css')}}
@stop

@section('end-js')
{{ HTML::script('js/diary.js')}}

<script>
    $("#diary").addClass("nav-active");
</script>
@stop