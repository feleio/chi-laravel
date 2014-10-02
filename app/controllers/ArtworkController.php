<?php

class ArtworkController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$artworks = Artwork::with('image')->orderBy('created_at','desc')->get();
		return View::make('artworks.index')->with('artworks',$artworks);
	}


}
