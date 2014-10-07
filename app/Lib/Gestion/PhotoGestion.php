<?php namespace Lib\Gestion;

use Str;
use Config;

class PhotoGestion implements PhotoGestionInterface {

    public function save($image)
	{
		$chemin = Config::get('image.path');
		$extension = $image->getClientOriginalExtension();
		do {
			$nom = Str::random(10) . '.' . $extension;
		} while(file_exists($chemin . '/' . $nom)); 
		return $image->move($chemin, $nom);
	}

}