<?php

use Illuminate\Http\Request;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('passwords', 'PasswordController');
	Route::post('create', 'PasswordController@create');


Route::apiResource('user', 'UserController');

Route::apiResource('category', 'CategroyController');


