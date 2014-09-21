<?php
class UsersController extends BaseController {

    public function __construct()
	{
		$this->beforeFilter('csrf', array('on' => 'post'));
	}

    public function getInfos()
	{
		return View::make('users.infos');
	}

	public function postInfos()
	{
		echo 'Le nom est ' . Input::get('nom');
	}

}