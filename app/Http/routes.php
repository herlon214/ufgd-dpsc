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
Route::get('/categoria/{id}', 'IndexController@category');

Route::group(['prefix' => '/admin'], function() {
  Route::resource('/comentarios', 'Admin\CommentsController');
  Route::resource('/usuarios', 'Admin\UsersController');
  Route::resource('/classificados', 'Admin\ClassifiedsController');
  Route::resource('/publicidades', 'Admin\AdsController');
});

Route::get('/out/{id}', function($id) {
  $ad = \App\Models\Ads::find($id);
  $hit = new \App\Models\AdsHit();
  $hit->ad_id = $id;
  $hit->created_at = date('Y-m-d H:i:s');
  $hit->save();

  return redirect()->away($ad->url);
});

Route::resource('/user', 'UserController');
Route::resource('/comment', 'CommentsController');
Route::resource('/denounce', 'DenounceController');
Route::resource('/signup', 'SignupController');
Route::resource('/classificados', 'ClassifiedsController');

Route::get('/login', 'LoginController@index');
Route::post('/login', 'LoginController@login');
Route::get('/logout', function() {
  \Auth::logout();
  return redirect('/');
});

