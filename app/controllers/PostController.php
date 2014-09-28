<?php

use Auth;

class PostController extends BaseController 
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
		/*$posts = Post::all();
		
 		$this->layout->title = 'Liste des articles';
		$this->layout->main = View::make('dash')->nest('content','posts.index',compact('posts'));*/
		

    	$sortby = Input::get('sortby');
	    $order = Input::get('order');
	 
	    if ($sortby && $order) {
	        $posts = Post::orderBy($sortby, $order)->get();
	    } else {
	        $posts = Post::all();
	    }
	 
	 	$this->layout->title = 'Liste des articles';
		$this->layout->main = View::make('dash')->nest('content','posts.index',compact('posts', 'sortby', 'order'));
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		/*return View::make('posts.create');*/
		$this->layout->title = 'Nouvel article';
		$this->layout->main = View::make('dash')->nest('content', 'posts.create');
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
				'title' => array('required', 'unique:posts,title'),
				'content' => array('required')
				);
		// pass input to validator
		$validator = Validator::make(Input::all(), $rules);
		// test if input fails
		if($validator->fails()) {
			return Redirect::route('posts.create')->withErrors($validator)->withInput();
		}
		$title = Input::get('title');
		$content = Input::get('content');
		$slug = Str::slug($title);
		$draft = Input::get('draft'); /*(Input::has('draft')) ? 1 : 0;*/
		$post = new Post();
		$post->title = $title;
		/* RAJOUTER PUBLICATION OU BROUILLON*/
		$post->content = $content;
		$post->slug = $slug;
		$post->draft = $draft;
		$post->user_id = Auth::user()->id;
		$post->save();
		return Redirect::route('posts.index')->withMessage("L'article a été créé");
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */	
	/*
	public function show($id)
	{
		$post = Post::findOrFail($id);
		return View::make('posts.show')->withPost($post);
	}
	*/
	 public function show($id)
	{
		$post = Post::findOrFail($id);
		$comments = $post->comments()->where('approved', '=', 1)->get();
		$this->layout->title = $post->title;
		$this->layout->main = View::make('home')->nest('content', 'posts.show', compact('post', 'comments'));
	}
	

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$post = Post::findOrFail($id);
		/*return View::make('posts.edit')->withPost($post);*/
		$this->layout->title = "Modifier l'article";
		$this->layout->main = View::make('dash')->nest('content', 'posts.edit', compact('post'));
	}
	

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		// define rules
		$rules = array(
				'title' => array('required', /*'unique:posts,title'*/),
				'content' => array('required')
				);
		// pass input to validator
		$validator = Validator::make(Input::all(), $rules);
		// test if input fails
		/* @TODO : Faire fonctionner le Validator de l'Update !! (a priori, problème avec méthode Edit également) */
		if($validator->fails()) {
			return Redirect::route('posts.edit', $id)->withErrors($validator)->withInput();
		}
		
		$title = Input::get('title');
		$content = Input::get('content');
		$slug = Str::slug($title);
		$draft = Input::get('draft');
		$post = Post::findOrFail($id);
		$post->title = $title;
		$post->content = $content;
		$post->slug = $slug;
		$post->draft = $draft;
		$post->update();
		return Redirect::route('posts.index')->withMessage("L'article a été modifié");
	}
	
	public function updateStatut(Post $post)
	{

		$post->draft = Input::get('draft');
		$post->update();
		return Redirect::route('posts.index')->withMessage("L'article a été modifié");
	}
	
	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$post = Post::findOrFail($id)->delete();
		
		return Redirect::route('posts.index')->withMessage("L'article a été supprimé");
	}
}


