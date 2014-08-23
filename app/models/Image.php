<?php 

class Image extends Eloquent {
	public function posts()
	{
		$this->hasMany('Post');
	}

	public function artworks()
	{
		$this->belongsToMany('Artwork');
	}
}

