<?php

use Auth;

class PageController extends \BaseController 
{
	public function __construct()
	{
		$this->beforeFilter('csrf', array('on' => ['post', 'put']));
		$this->beforeFilter('auth', array('except' => ['show']));
		$this->beforeFilter('admin', array('only' => 'destroy'));
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$pages = Page::all();
		
 		$this->layout->title = 'Liste des pages';
		$this->layout->main = View::make('dash')->nest('content','pages.index',compact('pages'));
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$this->layout->title = 'Nouvelle page';
		$this->layout->main = View::make('dash')->nest('content', 'pages.create');
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
				'title' => array('required', 'unique:pages,title'),
				'content' => array('required')
				);
		// pass input to validator
		$validator = Validator::make(Input::all(), $rules);
		// test if input fails
		if($validator->fails()) {
			return Redirect::route('admin.pages.create')->withErrors($validator)->withInput();
		}
		$title = Input::get('title');
		$content = Input::get('content');
		$slug = Str::slug($title);
		$draft = Input::get('draft'); /*(Input::has('draft')) ? 1 : 0;*/
		$page = new Page();
		$page->title = $title;
		/* RAJOUTER PUBLICATION OU BROUILLON*/
		$page->content = $content;
		$page->slug = $slug;
		$page->draft = $draft;
		$page->save();
		return Redirect::route('admin.pages.index')->withMessage("La page a été créée");
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
	public function edit(Page $page)
	{
		$this->layout->title = "Modifier la page";
		$this->layout->main = View::make('dash')->nest('content', 'pages.edit', compact('page'));
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(Page $page)
	{
		// define rules
		$rules = array(
				'title' => array('required', /*'unique:pages,title'*/),
				'content' => array('required')
				);
		// pass input to validator
		$validator = Validator::make(Input::all(), $rules);
		// test if input fails
		/* @TODO : Faire fonctionner le Validator de l'Update !! (a priori, problème avec méthode Edit également) */
		if($validator->fails()) {
			return Redirect::route('admin.pages.edit', $id)->withErrors($validator)->withInput();
		}
		
		$title = Input::get('title');
		$content = Input::get('content');
		$slug = Str::slug($title);
		$draft = Input::get('draft');
		$page->title = $title;
		$page->content = $content;
		$page->slug = $slug;
		$page->draft = $draft;
		$page->update();
		return Redirect::route('admin.pages.index')->withMessage("La page a été modifiée");
	}

	public function updateStatut($id)
	{
		$page = Page::findOrFail($id);
		$page->draft = Input::get('draft');
		$page->update();
		return Redirect::route('admin.pages.index')->withMessage("La page a été modifiée");
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy(Page $page) // BUG A CORRIGER - IMPOSSIBLE DE SUPPRIMER UNE PAGE CAR REDIRECT SUR PAGE @show
	{
		$page->delete();
		return Redirect::route('admin.pages.index')->withMessage("La page a été supprimée");
	}


}
