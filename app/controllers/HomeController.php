<?php

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function showWelcome()
	{
		$artworks = Artwork::with('image')
			->orderBy('created_at','desc')->take(4)->get();

		$posts = Post::with('image')
			->orderBy('created_at','desc')->get();

		$data = array(	'artworks' => $artworks,
						'posts' => $posts );
		return View::make('home')->with($data);
	}

}
