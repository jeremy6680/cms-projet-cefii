<?php

class HomeController extends BaseController {
	
	protected $layout='layouts.front';

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/
	
	public function index()
	{
		$posts = Post::where('draft', '=', 0)->orderBy('created_at', 'desc')->paginate(10); 
		$this->layout->title = 'Page d\'accueil | My Blog';
		$this->layout->main = View::make('home')->nest('content','index',compact('posts'));
	}
	
	/*
	public function displayPage($id)
	{
		$page = Page::findOrFail($id);
		$this->layout->title = $page->title;
		$this->layout->main = View::make('home')->nest('content', 'pages.show', compact('page'));
	}
	*/
}
