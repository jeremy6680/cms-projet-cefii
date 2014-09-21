<?php namespace Lib\Validation;

class PostCreateValidator extends BaseValidator {

    public function __construct()
	{
		$this->rules = array(
				'title' => array('required', 'unique:posts,title'),
				'content' => array('required')
				);
	}

}