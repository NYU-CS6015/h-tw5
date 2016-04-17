<?php
use App\Http\Middleware\Authenticate;
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::auth();

Route::get('/home', 'HomeController@index');

Route::get('/user/{user}','UserController@getProfile');


Route::group(['middleware' => Authenticate::class], function () {

	Route::get('/home', 'UserController@index');

	Route::post('/home','StatusController@postStatus');

	Route::post('/follow','FollowerController@follow');
	Route::post('/unfollow','FollowerController@unfollow');




});