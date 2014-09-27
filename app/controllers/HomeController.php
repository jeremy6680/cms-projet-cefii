<?php

class HomeController extends BaseController {

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
		$posts = Post::where('draft', '=', 0) -> get();
		$this->layout->title = 'Page d\'accueil | My Blog';
		$this->layout->main = View::make('home')->nest('content','index',compact('posts'));
		/*return View::make('home')->with('posts', $posts);*/
	}

}
