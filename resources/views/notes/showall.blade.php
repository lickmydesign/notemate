@extends('layouts.default')

@section('content')

	<p>
		<a href="/note" class="btn btn-success"><i class="fa fa-plus"></i> Add Note</a>
	</p>

	@if (count($notes) > 0)
		<div class="panel-body">
			<table class="table table-striped">
				<thead>
				<tr>
					<th>Title</th>
					<th>Created</th>
					<th>Actions</th>
				</tr>
				</thead>
				<tbody>
				@foreach ($notes as $note)
					<tr>
						<!-- Note Name -->
						<td class="table-text">
							<a href="/notes/{{ $note->id }}" title="View Note">{{ $note->title }}</a>
						</td>
						<td>{{ date($date_format, strtotime($note->created_at)) }}</td>
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

		{!! $notes->render() !!}

	@else
		<div class="panel-body text-muted">
			No notes available.
		</div>
	@endif

@endsection