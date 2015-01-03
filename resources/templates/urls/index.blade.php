@extends('layout')

@section('content')
	<p>
		<a href="{{ URL::to('panel/create') }}" class="btn btn-primary">New Redirect</a>
	</p>

	<table class="table table-striped table-responsive">
		<thead>
			<tr>
				<td><strong>ID</strong></td>
				<td><strong>Slug</strong></td>
				<td><strong>Dist</strong></td>
				<td><strong>Title</strong></td>
				<td><strong>Clicks</strong></td>
				<td><strong>Created</strong></td>
				<td></td>
				<td></td>
			</tr>
		</thead>

		<tbody>
			@foreach($urls as $u)
				<tr>
					<td>{{ $u->id }}</td>
					<td>{{ $u->slug }}</td>
					<td>{{ $u->dist }}</td>
					<td>{{ substr($u->title, 0, 50) }}</td>
					<td>{{ $u->clicks }}</td>
					<td>{{ $u->created_at }}</td>
					<td>
						<a href="{{ URL::to('panel/' . $u->id . '/edit')  }}" class="btn btn-success btn-block btn-sm">edit</a>
					</td>
					<td>
						{!! Form::open(['route' => ['panel.destroy', $u->id], 'method' => 'DELETE']) !!}
							{!! Form::submit('remove', array(
								'class'   => 'btn btn-warning btn-block btn-sm',
								'onclick' => 'return confirm("Are you sure you want to remove?")'
								)) !!}
						{!! Form::close() !!}
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>

@endsection
