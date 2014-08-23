<?php 

class Tag extends Eloquent {
	public function posts()
	{
		$this->morphedByMany('Post', 'taggable');
	}

	public function artworks()
	{
		$this->morphedByMany('Artwork', 'taggable');
	}
}

