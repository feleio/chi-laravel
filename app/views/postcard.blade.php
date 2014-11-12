
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

		<img class="img-postcard" src="imgs/postcard.png"></img>

		<p>“把她送上鐵塔給全世界的人寫明信片”</p>

		<p>給全世界的人寄明信片<br>
			如果也想收到我親手繪製的明信片<br>
			或者想訂製心目中的明信片<br>
			請留下聯絡資料或發信到我的電郵</p>

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