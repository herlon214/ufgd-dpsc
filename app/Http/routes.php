<?php

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

Route::get('/', 'IndexController@index');
Route::post('/search', 'IndexController@search');
Route::get('/category/{id}', 'IndexController@category');

Route::resource('/signup', 'SignupController');
Route::get('/login', 'LoginController@index');
Route::post('/login', 'LoginController@login');
Route::get('/logout', function() {
  \Auth::logout();
  return redirect('/');
});
Route::resource('/classificados', 'ClassifiedsController');