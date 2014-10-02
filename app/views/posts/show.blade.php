@extends('layouts.master')

@section('title',$post->title)

@section('head-css')
{{ HTML::style('css/posts.show.css') }}
@stop

@section('head-js')
<script>

</script>
@stop

@section('content')
<div class="c-post-content">
	<div class="f_right">
		<button type="button" class="btn btn-danger like-btn" disabled="disabled">
			<i class="fa fa-heart"></i>
			<span class="like_text">Like (</span>
			<span class="like_count">
				{{$post->base_like_count+$post->like_count}}
			</span> 
			<span>)</span>
		</button>
	</div>
    <h1>{{$post->title}}</h1>
    @if (Auth::check())
    <div class="f_right">
    	<a href="{{URL::to('/posts/'.$post->id.'/edit')}}" class="btn btn-primary btn-xs">Edit</a>
    </div>
    @endif
    <h6>{{$post->created_at}}</h6>
    {{$post->content}}
</div>
<div class="c-post-footer">
	<a class="btn btn-primary">
		<i class="fa fa-envelope"></i>
		<span>Email me</span>
	</a>
		<button type="button" class="btn btn-danger like-btn" disabled="disabled">
			<i class="fa fa-heart"></i>
			<span class="like_text">Like (</span>
			<span class="like_count">
				{{$post->base_like_count+$post->like_count}}
			</span> 
			<span>)</span>
		</button>
</div>

@stop

@section('end-js')
<script>
	$(function(){
		if ({{json_encode($isLiked)}})
			$(".like_text").text("Liked (");
		else
			$(".like-btn").removeAttr("disabled");
	})
	$(".like-btn").click(function(){
		$.ajax({
			url: "{{URL::to('/posts/'.$post->id.'/like')}}",
			type: "POST",
			dataType: "json"
		}).done(function(data){
			$(".like-btn").attr("disabled","disabled");
			var count = parseInt( $(".like_count").first().text(), 10);
			$(".like_count").text(count+1);
			$(".like_text").text("Liked (");
		});
	});
</script>
@stop
