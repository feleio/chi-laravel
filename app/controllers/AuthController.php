<?php

class AuthController extends \BaseController {
	public function getLogin()
	{
		if( Auth::guest() )
			return View::make('auth.login');
		else
			return Redirect::to('/');
	}

	public function postLogin()
	{
		$credential = array(
			'name' => Input::get('name'),
			'password' => Input::get('password'));

		if(Auth::attempt($credential))
		{
			return Redirect::intended('/');
		}
		else
		{
			return Redirect::to('auth/login')->withInput(
				array('isFailed' => True));
		}
	}

	public function getLogout()
	{
		if(Auth::check())
			Auth::logout();

		return Redirect::to('/');
	}
}