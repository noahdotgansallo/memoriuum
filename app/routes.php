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
Route::get('/', function(){
	return View::make('tester');
});

Route::group(array('prefix' => 'api'), function(){

	//Uauth Routes
	Route::group(array('prefix' => 'uauth'), function(){

		//Uauth Register Route
		Route::post('/register', 'UserAuthController@register');

		//Uauth Login Route
		Route::post('/login', 'UserAuthController@login');

		//Uauth Logout Route
		Route::post('/logout', 'UserAuthController@logout');

		//Uauth Activation Group
		Route::group(array('prefix' => 'activation'), function(){

			//Uauth Activation Route
			Route::get('{code}', 'UserAuthController@activate');
		});
	});

	//Memory Routes
	Route::group(array('prefix' => 'memory', 'before' => 'uauth'), function(){

		//Memory Create Route
		Route::post('create', 'MemoryController@create');

		//Memory Focus Route
		Route::post('/focus/{id}', 'MemoryController@focus');

		//Memory Edit Route
		Route::post('/edit/{id}', 'MemoryController@edit');

		//Memory Destroy Route
		Route::post('/destroy/{id}', 'MemoryController@destroy');

	});

});
