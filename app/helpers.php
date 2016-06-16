<?php

// helper for flash messsages

function flash ($message, $level = 'default')
{
	session()->flash('flash_message', $message);
	session()->flash('flash_message_level', $level);
}
