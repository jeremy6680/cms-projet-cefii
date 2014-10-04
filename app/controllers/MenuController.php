<?php

class MenuController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit(Menu $menu)
	{
		/*$post = Post::findOrFail($id);*/
		/*return View::make('posts.edit')->withPost($post);*/
		$this->layout->title = "Modifier le menu";
		$this->layout->main = View::make('dash')->nest('content', 'menu.edit', compact('menu'));
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(Menu $menu)
	{
		// define rules
		$rules = array(
				'name' => array('required', /*'unique:posts,title'*/),
				'posiyion' => array('required')
				);
		// pass input to validator
		$validator = Validator::make(Input::all(), $rules);
		// test if input fails
		/* @TODO : Faire fonctionner le Validator de l'Update !! (a priori, problème avec méthode Edit également) */
		if($validator->fails()) {
			return Redirect::route('menu.edit', $id)->withErrors($validator)->withInput();
		}
		
		$name = Input::get('name');
		$route = Input::get('route');
		$position = Input::get('position');
		$menu->name = $name;
		$menu->route = $route;
		$menu->position = $position;
		$menu->update();
		return Redirect::route('menu.edit')->withMessage("L'article a été modifié");
	}


}
