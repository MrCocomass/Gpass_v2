<?php

use Illuminate\Http\Request;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('passwords', 'PasswordController');
	Route::post('create', 'PasswordController@create');
	Route::put('updatepassword/{id}', 'PasswordController@update');
	Route::delete('deletepassword/{id}','PasswordController@destroy');
	Route::get('showpassword','PasswordController@show');


Route::apiResource('user', 'UserController');
	Route::post('register','UserController@register');
	Route::post('login','UserController@login');
	Route::get('showuser','UserController@show');

		
Route::apiResource('category', 'CategoryController');
	Route::post('addcategory','CategoryController@create');
	Route::put('updatecategory/{id}','CategoryController@update');
	Route::delete('deletecategory/{id}','CategoryController@destroy');
	Route::get('showcategory','CategoryController@show');


