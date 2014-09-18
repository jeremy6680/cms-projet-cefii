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
/* BUG on this one
Route::get('/posts', function($posts)
{
	return View::make('posts.index');
});
*/
Route::get('/posts/{slug}', [
	'as' => 'post-show',
	'uses' => 'PostController@getShow'
]);

/* Test */
Route::resource('blog', 'ArticleController');
