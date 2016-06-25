@extends('layouts.default')

@section('content')

	<form action="/note" method="POST" class="form-horizontal">
		{{ csrf_field() }}

		<fieldset>
			<legend>{{ $page_title }}</legend>

			<div class="form-group">
				<label for="note-title" class="col-sm-3 control-label">Title</label>

				<div class="col-sm-6">
					<input type="text" name="title" id="note-title" value="{{ old('title') }}" class="form-control">
				</div>
			</div>

			<div class="form-group">
				<label for="note-contents" class="col-sm-3 control-label">Note</label>

				<div class="col-sm-6">
					<textarea name="contents" id="note-contents" class="form-control">{{ old('contents') }}</textarea>
				</div>
			</div>

			<div class="form-group">
				<div class="col-sm-offset-3 col-sm-6">
					<button type="submit" class="btn btn-primary">
						<i class="fa fa-plus"></i> Add Note
					</button>
					<a href="{{ url('/notes') }}" class="btn btn-default"><i class="fa fa-times"></i> Cancel</a>
				</div>
			</div>
		</fieldset>
	</form>

@endsection