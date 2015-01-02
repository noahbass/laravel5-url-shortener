@extends('layout')

@section('content')

	<p><a href="{{ URL::to('panel') }}">back</a></p>

	{!! Form::open(['route' => 'panel.store']) !!}
		<div class="form-group">
			{!! Form::label('slug') !!}
			{!! Form::text('slug', null, array('class' => 'form-control', 'placeholder' => 'yo', 'autofocus')) !!}
		</div>

		<div class="form-group">
			{!! Form::label('Dist URL') !!}
			{!! Form::text('dist', null, array('class' => 'form-control', 'placeholder' => 'https://www.google.com/')) !!}
		</div>

		<div class="form-group">
			{!! Form::submit('Create', array('class' => 'btn btn-success')) !!}
		</div>
	{!! Form::close() !!}

@endsection
