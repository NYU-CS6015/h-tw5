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

Route::get('/{user}','UserController@getProfile');

Route::get('/login','Auth\AuthController@getLogin');
Route::post('/login','Auth\AuthController@postLogin');


Route::group(['middleware' => [Authenticate::class,'web']], function () {

	Route::get('/home', 'UserController@index');
	Route::get('/logout','Auth\AuthController@logOut');

	Route::post('/home','StatusController@postStatus');

	Route::post('/follow','FollowerController@follow');
	Route::post('/unfollow','FollowerController@unfollow');

});