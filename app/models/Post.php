<?php 

class Post extends Eloquent {
	public function tags()
	{
		return $this->morphToMany('Tag', 'taggable');
	}

	public function image()
	{
		return $this->belongsTo('Image');
	}

	public function comments()
	{
		return $this->morphMany('Comment', 'commentable');
	}
}

