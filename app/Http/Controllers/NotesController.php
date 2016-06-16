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
		//todo: get latest notes
		return view('notes.index');
	}

	public function all()
	{
		return view('notes.showall');
	}

	public function show()
	{
		return view('notes.show');
	}

	public function add()
	{
		return view('notes.add');
	}

	public function save()
	{

	}

	public function edit()
	{
		return view('notes.edit');
	}

	public function update()
	{

	}

	public function delete()
	{

	}
}
