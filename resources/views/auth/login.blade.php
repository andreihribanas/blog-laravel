@extends('layouts.main')

@section('title', ' | Login')

@section('content')

	<div class="container">
		<div class="row">
			<div class="col-md-6 offset-md-3">
				<div class="card">
					<div class="card-header"> <strong> Login page </strong> </div>

						<div class="card-block">
							{!! Form::open() !!}
								<div class="form-group">
									<strong>{!! Form::label('email', 'Email') !!}</strong>
									{!! Form::email('email', null, ['class' => 'form-control']) !!}
								</div>

								<div class="form-group">
									<strong>{!! Form::label('password', 'Enter the password:') !!}</strong>
									{!! Form::password('password', ['class' => 'form-control']) !!}
								</div>

								<div class="form-group">
									<strong>{!! Form::label('remember', ' Remember me') !!}</strong>
									{!! Form::checkbox('remember', null, ['class' => 'form-control']) !!}

									<a href="{{ url('password/reset') }}" > Forgot password </a>
								</div>

								
								<div class="form-group">
									{!! Form::submit('Login', ['class' => 'btn btn-primary btn-lg btn-block']) !!}
								</div>
								
							{!! Form::close() !!}
						</div>
					</div>
			</div>
		</div>
	</div>

@stop