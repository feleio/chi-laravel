<?php

class PostController extends \BaseController {

	public function __construct()
    {
        $this->beforeFilter('auth', array('only' => 
        	array('create', 'store', 'edit', 'update')));
    }

	public function index()
	{
		$posts = Post::with('image')->orderBy('created_at','desc')->get();
		return View::make('posts.index')->with('posts',$posts);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('posts.form');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$post = new Post;
		$post->title = Input::get('title');
		$post->content = Input::get('content');
		$post->image_id = Input::get('image_id');
		$post->save();

		return Redirect::to('posts');
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$post = Post::findOrFail($id);
		
		$post->seen_count = $post->seen_count + 1;
		$post->save();

		$likedPosts = json_decode(Cookie::get('liked_posts', '[]'));
		$isLiked = in_array($post->id, $likedPosts);

		$data = array( 
			'post' => Post::findOrFail($id),
			'isLiked' => $isLiked );

		return View::make("posts.show")->with($data);
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$post = Post::findOrFail($id);
		return View::make('posts.form')->with('post', $post);
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$post = Post::findOrFail($id);
		$post->title = Input::get('title');
		$post->content = Input::get('content');
		$post->image_id = Input::get('image_id');
		$post->save();

		return Redirect::to('posts/'.$id);
	}

	public function like($id)
	{
		if (Request::ajax())
		{
			$post = Post::findOrFail($id);
			$post->like_count = $post->like_count + 1;
			$post->save();

			$likedPosts = json_decode(Cookie::get('liked_posts', '[]'));

			if ( !in_array($post->id, $likedPosts) )
				$likedPosts[] = $post->id;
			$likedPostsJson = json_encode($likedPosts);

			$cookie = Cookie::forever('liked_posts', $likedPostsJson);

			$response = Response::json(array(
				'result' => 1,
				'like_count' => $post->like_count));
			$response->headers->setCookie($cookie);
			return $response;
		}
		
		App::abort(404);
	}
}
