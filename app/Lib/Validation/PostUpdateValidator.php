<?php namespace Lib\Validation;

class PostUpdateValidator extends BaseValidator {

    public function __construct()
	{
		$this->regles = array(
			'title' => 'required|max:80|unique:posts,title',
			'content' => 'required'
		);
	}

}