@extends('layout')

@section('content')
	{!! Form::open(array('url' => URL::to('auth/login'))) !!}
		<div class="form-group">
			{!! Form::label('email', 'Email Address') !!}
			{!! Form::text('email', null, array('class' => 'form-control', 'placeholder' => 'you@example.com', 'autofocus')) !!}
		</div>

		<div class="form-group">
			{!! Form::label('password', 'Password') !!}
			{!! Form::password('password', array('class' => 'form-control', 'placeholder' => 'password')) !!}
		</div>

		<div class="form-group">
			{!! Form::submit('Login', array('class' => 'btn btn-primary')) !!}
		</div>
	{!! Form::close() !!}
@endsection
