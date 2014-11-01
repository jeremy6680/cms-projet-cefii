<?php namespace Lib\Gestion;

use Post;
use Input;
use Auth;

class PostGestion {

    public function liste($n)
	{
		$posts = Post::with('user')
		->orderBy('posts.created_at', 'desc')
		->paginate(4);
		return compact('posts');
	}

	public function save()
	{
		Post::create(array(
			'titre' => Input::get('titre'),
			'contenu' => Input::get('contenu'),
			'user_id' => Auth::user()->id
		));
	}

	public function del($id)
	{
		Post::find($id)->delete();
	}

}