@extends('layouts.default')

@section('content')

	<form action="/notes/{{ $note->id }}" method="POST" class="form-horizontal">
		{{ csrf_field() }}
		{{ method_field('PATCH') }}

		<fieldset>
			<legend>{{ $page_title }}</legend>
			<div class="form-group">
				<label for="note-title" class="col-sm-3 control-label">Title</label>

				<div class="col-sm-6">
					<input type="text" name="title" id="note-title" value="{{ $note->title }}" class="form-control">
				</div>
			</div>

			<div class="form-group">
				<label for="note-contents" class="col-sm-3 control-label">Note</label>

				<div class="col-sm-6">
					<textarea name="contents" id="note-contents" class="form-control">{{ $note->contents }}</textarea>
				</div>
			</div>

			<div class="form-group">
				<div class="col-sm-offset-3 col-sm-6">
					<button type="submit" class="btn btn-primary">
						Save Changes
					</button>
					<a href="{{ url('/notes') }}" class="btn btn-default"><i class="fa fa-times"></i> Cancel</a>
				</div>
			</div>
		</fieldset>
	</form>

@endsection