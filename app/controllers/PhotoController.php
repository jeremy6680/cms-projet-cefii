<?php

use Lib\Validation\PhotoValidator as PhotoValidator;
use Lib\Gestion\PhotoGestion as PhotoGestion;

class PhotoController extends BaseController {

    protected $photogestion;

	public function __construct(PhotoValidator $validation, PhotoGestion $photogestion)
	{
		parent::__construct();
		$this->validation = $validation;
		$this->photogestion = $photogestion;
	}

	public function getForm()
	{
		/*return View::make('photo');*/
		$this->layout->title = 'Ajouter une photo';
		$this->layout->main = View::make('dash')->nest('content', 'photo');
	}

	public function postForm()
	{
		if ($this->validation->fails()) {
		    return Redirect::route('admin.photo.form')
            ->withErrors($this->validation->errors());
		} else {
			if($this->photogestion->save(Input::file('image'))) {
				$path = $this->photogestion->getPath(Input::file('image'));
				$this->layout->title = 'Ajouter une photo';
				$this->layout->main = View::make('dash')->nest('content', 'photo_ok',compact('path'));
			} else {
				return Redirect::route('admin.photo.form')
                ->with('error','Désolé mais votre image ne peut pas être envoyée !');
			}
		}
	}

}