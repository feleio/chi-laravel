<?php 

class Image extends Eloquent {
	public function posts()
	{
		return $this->hasMany('Post');
	}

	public function artworks()
	{
		return $this->belongsToMany('Artwork');
	}
}

