<?php
/* Ce contrôleur ne marche pas pour la validation */
use Lib\Validation\PostCreateValidator as PostCreateValidator;
use Lib\Validation\PostUpdateValidator as PostUpdateValidator;

class PostController extends BaseController {

    protected $create_validation;
	protected $update_validation;

	public function __construct(
		PostCreateValidator $create_validation, 
		PostUpdateValidator $update_validation
		)
	{
		parent::__construct();
		$this->create_validation = $create_validation;
		$this->update_validation = $update_validation;
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
		if ($this->create_validation->fails()) {
		  return Redirect::route('posts.create')
		  ->withInput()
		  ->withErrors($this->create_validation->errors());
		} else {
		
		$title = Input::get('title');
		$content = Input::get('content');
		$slug = Str::slug($title);
		$post = new Post();
		$post->title = $title;
		$post->content = $content;
		$post->slug = $slug;
		$post->save();
		return Redirect::route('posts.index')->withMessage("L'article a été créé");
		}
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */	
	public function show($id)
	{
		$post = Post::findOrFail($id);
		return View::make('posts.show')->withPost($post);
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
		return View::make('posts.edit')->withPost($post);
	}
	

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		if ($this->update_validation->fails($id)) {
		  return Redirect::route('posts.edit', array($id))
		  ->withInput()
		  ->withErrors($this->update_validation->errors());
		} else {
		
		$title = Input::get('title');
		$content = Input::get('content');
		$slug = Str::slug($title);
		$post = Post::findOrFail($id);
		$post->title = $title;
		$post->content = $content;
		$post->slug = $slug;
		$post->update();
		return Redirect::route('posts.index')->withMessage("L'article a été modifié");
		}
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


