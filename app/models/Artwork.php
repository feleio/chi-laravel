<?php 

class Artwork extends Eloquent {
	public function tags()
	{
		$this->morphToMany('Tag', 'taggable');
	}

	public function group()
	{
		$this->belongsTo('Group');
	}

	public function images()
	{
		$this->belongsToMany('Image');
	}

	public function comments()
	{
		$this->morphMany('Comment', 'commentable');
	}
}

