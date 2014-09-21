<?php namespace Lib\Validation;

class PostUpdateValidator extends BaseValidator {

    public function __construct()
	{
		$this->rules = array(
				'title' => array('required', /*'unique:posts,title'*/),
				'content' => array('required')
				);
	}

}