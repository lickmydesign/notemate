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

	public function index(Request $request)
	{
		$data['latest_notes'] = $request->user()->notes()->orderBy('created_at', 'desc')->take(5)->get();

		return view('notes.index', $data);
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
