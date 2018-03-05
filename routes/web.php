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

Route::get('contactame', ['as' => 'contactos', 'uses' => 'PagesController@contact']);

Route::get('/saludos/{nombre?}', [ 'as' => 'saludos', 'uses' => 'PagesController@saludo'])->where('nombre','[A-Za-z]+');

Route::post('contacto', 'PagesController@mensajes');

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