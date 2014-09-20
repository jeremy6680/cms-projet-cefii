<?php

class PostController extends BaseController 
{
	public function __construct()
	{
		$this->beforeFilter('csrf', array('on' => 'post'));
	}
	
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index() 
	{
		$posts = Post::all();
		
		return View::make('posts.index')->with('posts', $posts); 
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('posts.create');
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
		$post = new Post();
		$post->title = $title;
		$post->content = $content;
		$post->save();
		return Redirect::route('posts.index')->withMessage("L'article a été créé");
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */	
	 
	public function show($slug)
	{
		$post = Post::where('slug', '=', $slug)->firstOrFail();
		
		return View::make('posts.show')->with('post', $post);
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}
}


