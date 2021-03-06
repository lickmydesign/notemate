<?php

use App\Task;
use Illuminate\Html;

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

Route::auth();

// App home
Route::get('/', 'NotesController@index');

// Notes routes

// home - show latest
Route::get('/notes', 'NotesController@index');

// show all
Route::get('/all', 'NotesController@all');

// show detail
Route::get('/notes/{note}', 'NotesController@show');

// add
Route::get('/note', 'NotesController@add');
Route::post('/note', 'NotesController@save');

// edit
Route::get('/notes/{note}/edit', 'NotesController@edit');
Route::patch('/notes/{note}', 'NotesController@update');

// delete
Route::delete('/notes/{note}', 'NotesController@delete');

// about
Route::get('/about', 'AboutController@index');
