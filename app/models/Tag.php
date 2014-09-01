<?php 

class Tag extends Eloquent {
	public function posts()
	{
		return $this->morphedByMany('Post', 'taggable');
	}

	public function artworks()
	{
		return $this->morphedByMany('Artwork', 'taggable');
	}
}

