@extends('layouts.app')

@section('content')

	<h1>{{ $page_title }}</h1>

	<table class="table table-bordered">
		<tr>
			<th>Title</th><td colspan="3">{{ $note->title }}</td>
		</tr>
		<tr>
			<th>Created by</th><td>{{ $note->user->name }} at {{ date($date_format, strtotime($note->created_at)) }}</td><th>Last Updated</th><td>{{ date($date_format, strtotime($note->updated_at)) }}</td>
		</tr>
		<tr>
			<th>Contents</th><td colspan="3">{{ $note->contents }}</td>
		</tr>
	</table>

	<p>
		<a href="/notes" class="btn btn-default"><i class="fa fa-arrow-left"></i> Back</a>
	</p>

@endsection