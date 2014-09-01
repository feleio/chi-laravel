<?php 

class Group extends Eloquent {
	public function artworks()
	{
		return $this->hasMany('Artwork');
	}
}

