@extends('layouts.main')

@section('title', 'Reset password')


@section('content')

	<div class="container">
		<div class="row">
			<div class="col-md-6 offset-md-3">
				<div class="card">
					<div class="card-header"> Reset password </div>
		
					@if (session('status'))
						<div class="alert alert-success">
							{{ session('status') }}
						</div>
					@endif

					<div class="card-block">
						{!! Form::open(['url' => 'password/reset', 'method' => 'POST']) !!}
							{{ Form::hidden('token', $token) }}

							<div class="form-group">
								{{ Form::label('email', 'Email address:') }}
								{{ Form::email('email', $email, ['class' => 'form-control']) }}
							</div>

							<div class="form-group">
								{{ Form::label('password', 'New password:') }}
								{{ Form::password('password', ['class' => 'form-control'])  }}
							</div>

							<div class="form-group">
								{{ Form::label('password_confirmation', 'Confirm new password:') }}
								{{ Form::password('password_confirmation', ['class' => 'form-control']) }}
							</div>

							<div class="form-group">
								{!! Form::submit('Reset password', ['class' => 'btn btn-primary']) !!}
							</div>
						{!! Form::close() !!}
					</div>
					
				</div>
			<div class="panel panel-default">
				
			</div>

			</div>
		</div>
	</div>

@stop