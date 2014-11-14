
@extends('layouts.master')

@section('title', '繪製明信片')

@section('head-css')
<style>
	.centre-postcard{
		margin: 0 auto;
		width: 560px;
	}

	.img-postcard{
		margin-bottom: 20px;
	}

	.centre-postcard form{
		margin: 30px 0;
	}

	.carousel-control.left,.carousel-control.right{
		background-image: none;
	}

	.carousel-indicators li { 
		visibility: hidden; 
	}

</style>
@stop

@section('content')
	<div class="centre-postcard">
		@if (Session::has('isSuccess'))
	 	<div class="alert alert-{{{Session::get('isSuccess') ? 'success' : 'danger'}}}" role="alert">
	        {{{ Session::get('message') }}}
	        {{ HTML::ul($errors->all()) }}
	    </div>
	    @endif

		<div id="carousel-example-generic" class="carousel slide img-postcard" data-ride="carousel">
		  <!-- Indicators -->
		  <ol class="carousel-indicators">
		    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
		    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
		  </ol>

		  <!-- Wrapper for slides -->
		  <div class="carousel-inner" role="listbox">
		    <div class="item active">
		      <img src="\imgs\postcard.png">
		      <div class="carousel-caption">
		        
		      </div>
		    </div>
		    <div class="item">
		      <img src="\imgs\postcardsample.jpg" >
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

		<p>“把她送上鐵塔給全世界的人寫明信片”</p>

		<p>給全世界的人寄明信片<br>
			如果也想收到我親手繪製的明信片<br>
			或者想訂製心目中的明信片<br>
			請留下聯絡資料</p>

		{{ Form::open(array('url' => '/postcardrequests/send')) }}
			
			<div class="form-group">
				{{ Form::label('name', '你的名字') }}
				{{ Form::text('name', '', array('class' => 'form-control')) }}
			</div>

			<div class="form-group">
				{{ Form::label('email', '你的電郵') }}
				{{ Form::email('email', '', 
					array('class' => 'form-control')) }}
			</div>

			<div class="form-group">
				{{ Form::label('address', '你的地址') }}
				{{ Form::textarea('address', '', array('class' => 'form-control',
					'size' => '50x5')) }}
			</div>

			<div class="form-group">
				{{ Form::label('content', '內容/要求') }}
				{{ Form::textarea('content', '', array('class' => 'form-control')) }}
			</div>

	        {{ Form::submit('Submit', array('class' => 'btn btn-primary')) }}
	        {{ Form::reset('Reset', array('class' => 'btn btn-default')) }}

		{{ Form::close() }}
	</div>
@stop