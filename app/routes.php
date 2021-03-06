<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

/* voir si la database est connectée : 
Route::get('/db', function() 
{
	return DB::select('select database();');
});
*/
/* Pour voir le contenu des tables de la BDD : 
Route::get('/db', function() 
{
	return DB::table('posts')->get();
});
*/

	// ===============================================
	// BLOG PAGES ==================================
	// ===============================================

/*
 * / = home
 * /posts - all posts
 * /posts/1 - show
 * /posts/1/edit - edit and update
 * /posts/create - create new post
 */
/*
Route::get('/{category?}', [
	'as' => 'home',
	'uses' => 'HomeController@index'
]);
*/
Route::get('/', [
	'as' => 'home',
	'uses' => 'HomeController@index'
]);
/*
Route::get('/{page?}', [
	'before' => 'published',
	'as' => 'page',
	'uses' => 'PageController@show'
])
->where('page', '[0-9]+');
*/

Route::get('/{page?}', [
	'before' => 'published',
	'as' => 'page',
	'uses' => 'HomeController@displayPage'
])
->where('page', '[0-9]+');;

Route::get('/posts/{post?}', [
	'before' => 'published',
	'as' => 'post',
	'uses' => 'HomeController@displayPost'
])
->where('post', '[0-9]+');;

/*
Route::get('/{page?}', [
	'before' => 'published',
	'as' => 'page',
	'uses' => 'HomeController@displayPage'
]);
*/
Route::get('/category/{category?}', [
	'as' => 'category-list',
	'uses' => 'PostController@categoryList'
]);

/*
Route::get('/posts/', [
	'as' => 'posts',
	'uses' => 'PostController@index'
]);

Route::get('/posts/{id}', [
	'as' => 'posts.show',
	'uses' => 'PostController@show'
]);

Route::get('/create', [
	'as' => 'create',
	'uses' => 'PostController@create'
]);
*/

	// ===============================================
	// STATIC PAGES ==================================
	// ===============================================

// about page (app/views/about.blade.php)
Route::get('/about', array('as' => 'about', function()
{
	return View::make('about');
}));

// work page (app/views/contact.blade.php)
Route::get('/contact', array('as' => 'contact', function()
{
	return View::make('contact');
}));

Route::resource('posts', 'PostController');

/*Route::resource('users', 'UserController');*/

Route::controller('auth', 'AuthController');

/*
Route::filter('auth', function()
{
    if (Auth::guest()) return Redirect::guest('auth/login');
});
*/
Route::controller('password', 'RemindersController');



/* tests ci-dessous */
Route::controller('users', 'UsersController');
Route::get('login', ['as' => 'login', 'uses' => 'AuthController@getLogin']);
Route::get('logout', ['as' => 'logout', 'uses' => 'AuthController@getLogout']);

Route::post('/post/{post}/comment',['as' => 'comment.new','uses' =>'CommentController@newComment']);


View::composer('sidebar', function($view)
{
	$view->recentPosts = Post::orderBy('id','desc')->take(5)->get();
});

View::composer('menu', function($view)
{
	$view->menuItems = MenuItem::all();
});


/* Model Bindings */
Route::model('post','Post');
Route::model('comment','Comment');
Route::model('pages','Page');
Route::model('menuItem','MenuItem');
Route::model('user','User');
Route::model('page','Page');


	// ===============================================
	// ADMIN SECTION =================================
	// ===============================================

/* Admin routes */
Route::group(['prefix' => 'admin','before'=>'auth'],function()
{
	/*get routes*/
	Route::get('/',array('as' => 'admin', function()
	{
		$user = Auth::user()->pseudo;
		$layout = View::make('layouts.master');
		$layout->title = 'DashBoard';
		$layout->main = View::make('dash')->nest('content','admin.index', compact('user'));
		return $layout;
	 
	}));
	Route::get('/photo/form',['as' => 'photo.form','uses' => 'PhotoController@getForm']);
	Route::post('/photo/form',['as' => 'photo.form','uses' => 'PhotoController@postForm']);
	Route::resource('menu', 'MenuItemController');
	Route::resource('pages', 'PageController');
	Route::resource('user', 'UserController');
	Route::get('/posts/index',['as' => 'posts.index','uses' => 'PostController@index']);
	Route::get('/posts/create',['as' => 'posts.create','uses' => 'PostController@create']);
	Route::get('/posts/{post}/edit',['as' => 'posts.edit','uses' => 'PostController@edit']);
	Route::get('/posts/{post}/delete',['as' => 'posts.destroy','uses' => 'PostController@destroy']);
	Route::get('/pages/{page}/delete',['as' => 'pages.destroy','uses' => 'PageController@destroy']);
	/*Route::get('/menu/{menuItem}/delete',['as' => 'menu.destroy','uses' => 'MenuItemController@destroy']);*/
	Route::get('/comment/list',['as' => 'comment.list','uses' => 'CommentController@listComment']);
	Route::get('/comment/{comment}/show',['as' => 'comment.show','uses' => 'CommentController@showComment']);
	Route::get('/comment/{comment}/delete',['as' => 'comment.delete','uses' => 'CommentController@deleteComment']);
	/*Route::get('/users',['as' => 'users.index','uses' => 'UserController@index']);
	Route::get('/users/create',['as' => 'users.create','uses' => 'UserController@create']);
	Route::get('/users/{user}/edit',['as' => 'users.edit','uses' => 'UserController@edit']);
	Route::get('/users/{user}/show',['as' => 'users.show','uses' => 'UserController@show']);
	Route::get('/users/{user}/delete',['as' => 'users.destroy','uses' => 'UserController@destroy']);
	*/
	/*post routes*/
	Route::post('/post/save',['as' => 'post.save','uses' => 'PostController@store']);
	Route::post('/post/{post}/update',['as' => 'post.update','uses' => 'PostController@update']);
	Route::post('/comment/{comment}/update',['as' => 'comment.update','uses' => 'CommentController@updateComment']);
	/*Route::post('/users/save',['as' => 'users.save','uses' => 'UserController@store']);*/
	
	/*put routes*/
	Route::put('/post/{post}/updateStatut',['as' => 'posts.updateStatut','uses' => 'PostController@updateStatut']);
	Route::put('/pages/{page}/updateStatut',['as' => 'pages.updateStatut','uses' => 'PageController@updateStatut']);
	/*Route::put('/users/{user}/update',['as' => 'users.update','uses' => 'UserController@update']);*/

 
});

	
	// ===============================================
	// 404 ===========================================
	// ===============================================

App::missing(function($exception)
{

	// shows an error page (app/views/error.blade.php)
	// returns a page not found error
	return Response::view('error', array(), 404);
});