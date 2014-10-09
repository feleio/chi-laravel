@extends('layouts.master')

@section('title', '寫日記')

@section('head-css')
<style>
	.about-content{
		width: 350px;
		height: 290px;
		margin-left: 80px;
	}

	.about-logo{
		width: 400px;
		height: 290px;
	}

	.c-about-logo{
		position: relative;
		width: 150px;
		height: 166px;
		top: 80px;
		left: 100px;
	}
</style>
@stop

@section('content')
	<div class="about-content f_left">
		<p>About Me<i class="fa fa-star-o"></i></p>

		<p>Hello there. I am Cheese. Welcome to my blog. <br>
			Travelling and having a good time in Australia now!</p>


		<p>關於我<i class="fa fa-star-o"></i></p>

		<p>
			哈佬<br>
			我是芝士<br>
			正在旅居澳洲  發呆  虛耗  畫畫 逃避著香港的上班生活
		</p>

		<p>
			喜歡動物<br>
			喜歡旅行<br>
			喜歡大自然<br>
			最喜歡的還是頭上的那片星空<br>
			如果有來世  希望到另一個星球居住
		</p>
	</div>
	<div class="about-logo f_left">
		<div class="c-about-logo">
			<img src="imgs/chi_logo.png">
		</div>
	</div>
@stop