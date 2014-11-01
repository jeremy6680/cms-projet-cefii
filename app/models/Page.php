<?php

class Page extends Eloquent {
	
    protected $fillable = array('title','content','meta_title','meta_description');
	public $timestamps = true;

	
}
