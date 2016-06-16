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

// home - show all
Route::get('/notes', 'NotesController@index');

// show
Route::get('/notes/{note}', 'NotesController@show');

// add
Route::get('/notes/add', 'NotesController@add');
Route::post('/notes/add', 'NotesController@store');

// edit
Route::get('/notes/{note}/edit', 'NotesController@edit');
Route::patch('/notes/{note}', 'NotesController@update');

// delete
Route::delete('/notes/{note}/delete', 'NotesController@delete');
