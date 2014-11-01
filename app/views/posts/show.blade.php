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

<!-- 		<button type="button" class="btn btn-danger like-btn" disabled="disabled">
	<i class="fa fa-heart"></i>
	<span class="like_text">Like (</span>
	<span class="like_count">
		{{$post->base_like_count+$post->like_count}}
	</span> 
	<span>)</span>
</button> -->

    <h1>{{$post->title}}</h1>

    @if (Auth::check())
    <div class="f_right">
    	<a href="{{URL::to('/posts/'.$post->id.'/edit')}}" class="btn btn-primary btn-xs">Edit</a>
    </div>
    @endif
    <div class="c-post-info c-function-link">
	    <span class="c-function-sep">{{$post->created_at}}</span>
	    <span class="c-function-sep">
	        <a class="link-like link-disable" href="{{URL::to('/posts/'.$post->id.'/like')}}">
				<i class="fa fa-heart"></i>
				<span class="like_count">
					{{$post->base_like_count+$post->like_count}}
				</span> 
				<span class="like_text">Liked</span>
			</a>
		</span>
	</div>
    {{$post->content}}
</div>
<div class="c-post-footer c-function-link">
	<span class="c-function-sep">
    	<a class="link-like link-disable" href="{{URL::to('/posts/'.$post->id.'/like')}}">
			<i class="fa fa-heart"></i>
			<span class="like_count">
				{{$post->base_like_count+$post->like_count}}
			</span> 
			<span class="like_text">Liked</span>
		</a>
	</span>
	<span class="c-function-sep">
		<a class="link-email" href="{{URL::to('messages/send?post_id='.$post->id)}}">
			<i class="fa fa-envelope"></i>
			<span>Email me</span>
		</a>
	</span>
</div>
@stop

@section('end-js')
<script>
	$(function(){
		if (!{{json_encode($isLiked)}})
		{
			$(".link-like").removeClass("link-disable");
			$(".like_text").text("Like");
		}
	});

	$(".link-like").click(function(event){
		event.preventDefault();
		$.ajax({
			url: $(this).attr("href"),
			type: "POST",
			dataType: "json"
		}).done(function(data){
			$(".link-like").addClass("link-disable");
			var count = parseInt( $(".like_count").first().text(), 10);
			$(".like_count").text(count+1);
			$(".like_text").text("Liked");
		});
	});
</script>
@stop
