<?php

class Post extends Eloquent {
	
    protected $fillable = array('title','content','user_id');
	public $timestamps = true;

	public function user() 
	{
		return $this->belongsTo('User');
	}
	
}
