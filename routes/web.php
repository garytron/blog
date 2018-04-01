<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*Route::get('/', function () {
    echo "<a href=". route('contactos') .">oli</a><br/>";
    echo "<a href=". route('contactos') .">oli</a><br/>";
    echo "<a href=". route('contactos') .">oli</a><br/>";
    echo "<a href=". route('contactos') .">oli</a><br/>";
    echo "<a href=". route('contactos') .">oli</a><br/>";
    echo "<a href=". route('contactos') .">oli</a><br/>";
});*/

Route::get('/', ['as' => 'home', 'uses' => 'PagesController@home']);

Route::get('/saludos/{nombre?}', [ 'as' => 'saludos', 'uses' => 'PagesController@saludo'])->where('nombre','[A-Za-z]+');

// Definiendo cada uno.

/*
Route::get('messages/create', ['as' => 'messages.create', 'uses' => 'MessagesController@create']);

Route::post('messages', ['as' => 'messages.store', 'uses' => 'MessagesController@store']);

Route::get('messages', ['as' => 'messages.index', 'uses' => 'MessagesController@index']);

Route::get('messages/{id}', ['as' => 'messages.show', 'uses' => 'MessagesController@show']);

Route::get('messages/{id}/edit', ['as' => 'messages.edit', 'uses' => 'MessagesController@edit']);

Route::put('messages/{id}', ['as' => 'messages.update', 'uses' => 'MessagesController@update']);

Route::delete('messages/{id}', ['as' => 'messages.destroy', 'uses' => 'MessagesController@destroy']);
*/

// Agrupados

Route::resource('messages', 'MessagesController');
Route::resource('users', 'UsersController');

Route::get('login','Auth\LoginController@showLoginForm');

Route::post('login', ['as' => 'login', 'uses' => 'Auth\LoginController@login']);

Route::get('logout','Auth\LoginController@logout');
Route::get('roles',function (){
	return \App\Role::with('user')->get();
});


/*Route::get('test', function(){
	$user = new App\User;
	$user->name= 'Moderador';
	$user->email= 'Moderador@gmail.com';
	$user->password= bcrypt('123');
	$user->role_id = 2;
	$user->save();

	return $user;

});*/