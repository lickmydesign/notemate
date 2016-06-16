<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Note;

class NotesController extends Controller
{
	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */

	public function __construct()
	{
		// make sure all actions are authenticated
		$this->middleware('auth');
	}

	public function index()
	{

	}

	public function show()
	{

	}

	public function add()
	{

	}

	public function save()
	{

	}

	public function edit()
	{

	}

	public function update()
	{

	}

	public function delete()
	{

	}
}
