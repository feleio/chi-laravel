<?php 

class Group extends Eloquent {
	public function artworks()
	{
		$this->hasMany('Artwork');
	}
}

