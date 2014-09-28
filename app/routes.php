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

/*
 * / = home
 * /posts - all posts
 * /posts/1 - show
 * /posts/1/edit - edit and update
 * /posts/create - create new post
 */

Route::get('/', [
	'as' => 'home',
	'uses' => 'HomeController@index'
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

Route::resource('posts', 'PostController');

Route::resource('user', 'UserController');

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
Route::get('login', 'AuthController@getLogin');


View::composer('sidebar', function($view)
{
$view->recentPosts = Post::orderBy('id','desc')->take(5)->get();
});


/* Model Bindings */
Route::model('post','Post');
Route::model('comment','Comment');

/* Admin routes */
Route::group(['prefix' => 'admin','before'=>'auth'],function()
{
	/*get routes*/
	Route::get('dash-board',function()
	{
		$layout = View::make('layouts.master');
		$layout->title = 'DashBoard';
		$layout->main = View::make('dash')->with('content','Hi admin, Welcome to Dashboard!');
		return $layout;
	 
	});
	Route::get('/post/index',['as' => 'post.index','uses' => 'PostController@index']);
	Route::get('/post/create',['as' => 'post.create','uses' => 'PostController@create']);
	Route::get('/post/{post}/edit',['as' => 'post.edit','uses' => 'PostController@edit']);
	Route::get('/post/{post}/delete',['as' => 'post.destroy','uses' => 'PostController@destroy']);
	Route::get('/comment/list',['as' => 'comment.list','uses' => 'CommentController@listComment']);
	Route::get('/comment/{comment}/show',['as' => 'comment.show','uses' => 'CommentController@showComment']);
	Route::get('/comment/{comment}/delete',['as' => 'comment.delete','uses' => 'CommentController@deleteComment']);
	 
	/*post routes*/
	Route::post('/post/save',['as' => 'post.save','uses' => 'PostController@store']);
	Route::post('/post/{post}/update',['as' => 'post.update','uses' => 'PostController@update']);
	Route::post('/comment/{comment}/update',['as' => 'comment.update','uses' => 'CommentController@updateComment']);
	
	/*put routes*/
	Route::put('/post/{post}/updateStatut',['as' => 'posts.updateStatut','uses' => 'PostController@updateStatut']);
 
});