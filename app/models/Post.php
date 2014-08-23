<?php 

class Post extends Eloquent {
	public function tags()
	{
		$this->morphToMany('Tag', 'taggable');
	}

	public function image()
	{
		$this->belongsTo('Image');
	}

	public function comments()
	{
		$this->morphMany('Comment', 'commentable');
	}
}

