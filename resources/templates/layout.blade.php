<!doctype html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>{{ env('TITLE', 'L5 URL Shortener') }}</title>
		<meta name="robots" content"noindex, nofollow">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
	</head>
	<body>
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<br>

					@if(\Auth::user())
						<div class="row">
							<div class="col-sm-6">
								<p class="lead">Howdy, {{ \Auth::user()->name }}!</p>
							</div>

							<div class="col-sm-6">
								{!! Form::open(['url' => URL::to('auth/logout'), 'class' => 'form form-horizontal']) !!}
									{!! Form::submit('Logout', array('class' => 'btn btn-info pull-right')) !!}
								{!! Form::close() !!}
							</div>
						</div>
					@endif

					@if($errors->any())
						<div class="alert alert-info">
							@foreach ($errors->all() as $error)
								<p class="error">{{ $error }}</p>
							@endforeach
						</div>
					@endif

					@yield('content')
				</div>
			</div>
		</div>
	</body>
</html>
