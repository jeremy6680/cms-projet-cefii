<?php

class BaseController extends Controller {
	
	protected $layout='layouts.master';
	
    protected $validation;
	
    public function __construct()
	{
		$this->beforeFilter('csrf', array('on' => array('post', 'put', 'patch', 'delete')));
	}

	/**
	 * Setup the layout used by the controller.
	 *
	 * @return void
	 */
	protected function setupLayout()
	{
		if ( ! is_null($this->layout))
		{
			$this->layout = View::make($this->layout);
		}
	}

}
