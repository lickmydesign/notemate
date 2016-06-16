<?php

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use App\User;
use App\Note;

class NotePolicy
{
	use HandlesAuthorization;

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
