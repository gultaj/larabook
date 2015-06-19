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

Route::get('/', ['as' => 'home', 'uses' => 'PagesController@home']);

Route::get('register', ['as' => 'register', 'uses' => 'RegistrationController@create']);
Route::post('register', ['as' => 'register.store', 'uses' => 'RegistrationController@store']);

Route::get('login', ['as' => 'login', 'uses' => 'SessionsController@create']);
Route::post('login', ['as' => 'login.post', 'uses' => 'SessionsController@store']);

Route::get('logout', ['as' => 'logout', 'uses' => 'SessionsController@destroy']);

Route::get('statuses', ['as' => 'statuses', 'uses' => 'StatusesController@index']);
Route::post('statuses', ['as' => 'statuses', 'uses' => 'StatusesController@store']);

Route::get('users', ['as' => 'users', 'uses' => 'UsersController@index']);
Route::get('users/{username}', ['as' => 'users.profile', 'uses' => 'UsersController@show']);

Route::post('follows', ['as' => 'follows', 'uses' => 'FollowsController@store']);
Route::delete('follows/{id}', ['as' => 'follow', 'uses' => 'FollowsController@destroy']);