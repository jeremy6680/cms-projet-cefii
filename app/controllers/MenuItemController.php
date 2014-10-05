<?php

class MenuItemController extends \BaseController {

	
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$menuItems = MenuItem::all();
		
 		$this->layout->title = 'Menu';
		$this->layout->main = View::make('dash')->nest('content','menu.index',compact('menuItems'));
	}
	
	
	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$this->layout->title = 'Nouvel onglet pour le menu';
		$this->layout->main = View::make('dash')->nest('content', 'menu.create');
	}
	
	
	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		// define rules
		$rules = array(
				'name' => array('required', /*'unique:posts,title'*/),
				'position' => array('required')
				);
		// pass input to validator
		$validator = Validator::make(Input::all(), $rules);
		// test if input fails
		/* @TODO : Faire fonctionner le Validator de l'Update !! (a priori, problème avec méthode Edit également) */
		if($validator->fails()) {
			return Redirect::route('admin.menu.create', $id)->withErrors($validator)->withInput();
		}
		
		$name = Input::get('name');
		$route = Input::get('route');
		$position = Input::get('position');
		$menuItem = new MenuItem();
		$menuItem->name = $name;
		$menuItem->route = $route;
		$menuItem->position = $position;
		$menuItem->save();
		return Redirect::route('admin.menu.index')->withMessage("L'onglet de menu a été créé");
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show(Page $page)
	{
		$this->layout->title = $page->title;
		$this->layout->main = View::make('home')->nest('content', 'pages.show', compact('page'));
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit(MenuItem $menuItem)
	{
		/*$post = Post::findOrFail($id);*/
		/*return View::make('posts.edit')->withPost($post);*/
		$this->layout->title = "Modifier cet onglet du menu";
		$this->layout->main = View::make('dash')->nest('content', 'menu.edit', compact('menuItem'));
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(MenuItem $menuItem)
	{
		// define rules
		$rules = array(
				'name' => array('required', /*'unique:posts,title'*/),
				'position' => array('required')
				);
		// pass input to validator
		$validator = Validator::make(Input::all(), $rules);
		// test if input fails
		/* @TODO : Faire fonctionner le Validator de l'Update !! (a priori, problème avec méthode Edit également) */
		if($validator->fails()) {
			return Redirect::route('admin.menu.edit', $id)->withErrors($validator)->withInput();
		}
		
		$name = Input::get('name');
		$route = Input::get('route');
		$position = Input::get('position');
		$menuItem->name = $name;
		$menuItem->route = $route;
		$menuItem->position = $position;
		$menuItem->update();
		return Redirect::route('admin.menu.edit')->withMessage("L'article a été modifié");
	}


}
