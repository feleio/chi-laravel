<?php 

class Comment extends Eloquent {
	public function commentable()
	{
		$this->morphTo();
	}
}

