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

	public function show(Note $note)
	{
		// eager load user details for the note
		$data['note'] = $note->load('user');

		return view('notes.show', $data);
	}

	public function add()
	{
		return view('notes.add');
	}

	public function save(Request $request)
	{
		$this->validate($request, [
			'title' => 'required|max:255',
			'contents' => 'required',
		]);

		$request->user()->notes()->create($request->all());

		flash('Note created.', 'success');
		return redirect('/notes');
	}

	public function edit(Note $note)
	{
		$data['note'] = $note;

		return view('notes.edit', $data);
	}

	public function update(Request $request, Note $note)
	{
		$this->validate($request, [
			'title' => 'required|max:255',
			'contents' => 'required',
		]);

		$note->update($request->all());

		flash('Note updated.', 'success');
		return redirect('/notes');
	}

	public function delete(Note $note)
	{
		//check authorised
		$this->authorize('delete', $note);

		$note->delete();

		flash('Note deleted.', 'success');
		return redirect('/notes');
	}
}
