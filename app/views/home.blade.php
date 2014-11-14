@extends('layouts.master')

@section('title', 'Chi Sin Cheese')

@section('head-css')
{{ HTML::style('css/posts.index.css')}}
{{ HTML::style('css/home.css')}}
@stop

@section('content')
	<div class="c-above">
		<div class="c-left f_left">
			<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
			  <!-- Indicators -->
			  <ol class="carousel-indicators">
			    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
			    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
			  </ol>

			  <!-- Wrapper for slides -->
			  <div class="carousel-inner" role="listbox">
			  	<div class="item active">
			      <a href="{{URL::to('postcard')}}">
			      	<img src="\imgs\postcardsample.jpg" >
			      </a>
			      <div class="carousel-caption">
			      </div>
			    </div>
			    <div class="item">
			      <a href="{{URL::to('postcard')}}">
			      	<img src="\imgs\postcard.png">
			      </a>
			      <div class="carousel-caption">
			      </div>
			    </div>

			  </div>

			  <!-- Controls -->
			  <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
			    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
			    <span class="sr-only">Previous</span>
			  </a>
			  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
			    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
			    <span class="sr-only">Next</span>
			  </a>


			</div>
			<div class="post-card-content">
				<p>“把她送上鐵塔給全世界的人寫明信片”</p>

				<p>給全世界的人寄明信片<br>
					如果也想收到我親手繪製的明信片<br>
					或者想訂製心目中的明信片<br>
					請<a href="{{URL::to('postcard')}}">留下聯絡資料</a>或<a href="{{URL::to('messages/send')}}">發信到我的電郵</a></p>
			</div>
		</div>
		<div class=" c-right f_left">
			@foreach ($artworks as $artwork)
			<?php 
				$thumbnailPath = asset( 'imgs/uploads/'
									.$artwork->image->id
									.'_thm.'
									.$artwork->image->type);
			?> 
			<div class="c-artwork f_left">
				<a href="{{URL::to('artworks')}}">
					<img src="{{$thumbnailPath}}" class="">
				</a>
			</div>
			@endforeach
		</div>
	</div>
	<div class="c-below">
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
	</div>
@stop

@section('end-js')
{{ HTML::script('js/diary.js')}}

@stop