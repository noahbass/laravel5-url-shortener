@extends('layout')

@section('content')
	{!! Form::open(['url' => URL::to('auth/register')]) !!}
		<div class="form-group">
			{!! Form::label('name', 'Name') !!}
			{!! Form::text('name', null, array('class' => 'form-control', 'placeholder' => 'Your Name', 'autofocus')) !!}
		</div>

		<div class="form-group">
			{!! Form::label('email', 'Email Address') !!}
			{!! Form::email('email', null, array('class' => 'form-control', 'placeholder' => 'you@example.com')) !!}
		</div>

		<div class="form-group">
			{!! Form::label('password', 'Password') !!}
			{!! Form::password('password', array('class' => 'form-control', 'placeholder' => 'password')) !!}
		</div>

		<div class="form-group">
			{!! Form::label('password_confirmation', 'Password Confirm') !!}
			{!! Form::password('password_confirmation', array('class' => 'form-control', 'placeholder' => 'password (again)')) !!}
		</div>

		<div class="form-group">
			{!! Form::submit('Register', array('class' => 'btn btn-primary')) !!}
		</div>
	{!! Form::close() !!}
@endsection
