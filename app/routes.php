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