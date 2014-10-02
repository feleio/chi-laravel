@extends('layouts.master')

@section('title', 'Cheese Artworks')

@section('head-css')
{{ HTML::style('css/lib/lightbox-2.7.1/lightbox.css'); }}
<style>
	.c-artwork{
		margin: 6px
	}

	.c-artwork img{
		border: 1px solid #B5AC86;;
	}
</style>
@stop

@section('end-js')
{{ HTML::script('js/lib/lightbox-2.7.1/lightbox.min.js')}}
@stop

@section('content')	
	@foreach ($artworks as $artwork)
	<?php 
		$thumbnailPath = asset( 'imgs/uploads/'
							.$artwork->image->id
							.'_thm.'
							.$artwork->image->type);
		$imgPath = asset( 'imgs/uploads/'
							.$artwork->image->id
							.'.'
							.$artwork->image->type);
	?> 
	<div class="c-artwork f_left">
		<a href="{{$imgPath}}" data-lightbox="image">
			<img src="{{$thumbnailPath}}" class="">
		</a>
	</div>
	@endforeach
@stop