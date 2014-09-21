<?php namespace Lib\Validation;

class UserUpdateValidator extends BaseValidator {

    public function __construct()
	{
		$this->regles = array(
			'pseudo' => 'required|max:30|alpha|unique:users,pseudo,id',
			'email' => 'required|email|unique:users,email,id'
		);
	}

}