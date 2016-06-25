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
		view()->share('app_name', config('constants.app_name'));
		view()->share('date_format', config('constants.date_format'));
	}

	public function index(Request $request)
	{
		$data['total_notes'] = $request->user()->notes()->count();
		$data['latest_notes'] = $request->user()->notes()->orderBy('created_at', 'desc')->take(5)->get();

		$data['page_title'] = 'Welcome';
		return view('notes.index', $data);
	}

	public function all(Request $request)
	{
		$data['notes'] = $request->user()->notes()->orderBy('created_at', 'desc')->paginate(10);

		$data['page_title'] = 'All Notes';
		return view('notes.showall', $data);
	}

	public function show(Note $note)
	{
		// eager load user details for the note
		$data['note'] = $note->load('user');

		$data['page_title'] = 'Note Details';

		return view('notes.show', $data);
	}

	public function add()
	{
		$data['page_title'] = 'Add Note';
		return view('notes.add', $data);
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
		$data['page_title'] = 'Edit Note';
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
