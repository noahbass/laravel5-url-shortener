@extends('layout')

@section('content')

	<p><a href="{{ URL::to('panel') }}">back</a></p>

	@foreach ($errors->all() as $error)
		<p class="error">{{ $error }}</p>
	@endforeach

	{!! Form::open(['route' => ['panel.update', $resource->id], 'method' => 'PUT']) !!}
		<div class="form-group">
			{!! Form::label('slug') !!}
			{!! Form::text('slug', $resource->slug, array('class' => 'form-control', 'autofocus')) !!}
		</div>

		<div class="form-group">
			{!! Form::label('Dist URL') !!}
			{!! Form::text('dist', $resource->dist, array('class' => 'form-control')) !!}
		</div>

		<div class="form-group">
			{!! Form::submit('Update', array('class' => 'btn btn-success')) !!}
		</div>
	{!! Form::close() !!}

@endsection
