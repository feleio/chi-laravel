<?php 

class Artwork extends Eloquent {
	public function tags()
	{
		return $this->morphToMany('Tag', 'taggable');
	}

	public function group()
	{
		return $this->belongsTo('Group');
	}

	public function images()
	{
		return $this->belongsToMany('Image');
	}

	public function comments()
	{
		return $this->morphMany('Comment', 'commentable');
	}
}

