<?php namespace Lib\Validation;

class PhotoValidator extends BaseValidator {

    public function __construct()
	{
		$this->regles = array( 'image' => 'required|image' );
	}

}