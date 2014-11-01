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
	
    public function __construct()
    {
        $this->beforeFilter('published');

    }
	
	public function index()
	{
		$posts = Post::where('draft', '=', 0)->orderBy('created_at', 'desc')->paginate(10); 
		$this->layout->title = 'Page d\'accueil | My Blog';
		$this->layout->main = View::make('home')->nest('content','index',compact('posts'));
	}
	
	/*
	public function displayMenu()
	{
		$menuItems = MenuItem::all();
		$this->layout->main = View::make('dash')->nest('content','menu.index',compact('menuItems'));		
	}
	*/

	
	public function displayPage(Page $page)
	{
		$this->layout->title = $page->title;
		$this->layout->main = View::make('home')->nest('content', 'pages.show', compact('page'));
	}
	
	 public function displayPost(Post $post)
	{
		$previousPost = Post::where('draft', '=', 0)->where('id', '<', $post->id)->max('id');
		$nextPost = Post::where('draft', '=', 0)->where('id', '>', $post->id)->min('id');
		if(!is_null($previousPost)) {
			$previousPostTitle = Post::find($previousPost)->title;
		}
		if(!is_null($nextPost)) {
			$nextPostTitle = Post::find($nextPost)->title;
		}
		$comments = $post->comments()->where('approved', '=', 1)->get();
		$this->layout->title = $post->title;
		$this->layout->main = View::make('home')->nest('content', 'posts.show', compact('post', 'comments', 'previousPost', 'nextPost', 'nextPostTitle', 'previousPostTitle'));
	}
	
}
