<?php

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;

class NotePolicy
{
	use HandlesAuthorization;

	/**
	 * Create a new policy instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		//
	}

	/**
	 * Determine if the given user can delete the given task.
	 *
	 * @param  User  $user
	 * @param  Note  $note
	 * @return bool
	 */
	public function delete(User $user, Note $note)
	{
		return $user->id === $note->user_id;
	}

}
