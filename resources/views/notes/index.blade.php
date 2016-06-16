@extends('layouts.app')

@section('content')

	<p>Here you can find a quick overview of your latest notes.</p>

	<p>
		<a href="/notes/add" class="btn btn-success"><i class="fa fa-plus"></i> Add Note</a>
	</p>

	@if (count($latest_notes) > 0)
		<div class="panel-body">
			<table class="table table-striped">
				<thead>
				<tr>
					<th>Title</th>
					<th>Actions</th>
				</tr>
				</thead>
				<tbody>
				@foreach ($latest_notes as $note)
					<tr>
						<!-- Note Name -->
						<td class="table-text">
							<a href="/notes/{{ $note->id }}" title="View Note">{{ $note->title }}</a>
						</td>

						<td>
							<form action="{{ url('notes/'.$note->id) }}" method="POST">
								{{ csrf_field() }}
								{{ method_field('DELETE') }}

								<a href="/notes/{{ $note->id }}/edit" class="btn btn-warning"><i class="fa fa-pencil"></i> Edit</a>

								<button type="submit" class="btn btn-danger">
									<i class="fa fa-trash"></i> Delete
								</button>
							</form>
						</td>
					</tr>
				@endforeach
				</tbody>
			</table>
		</div>
	@else
		<div class="panel-body text-muted">
			No notes available.
		</div>
	@endif

@endsection