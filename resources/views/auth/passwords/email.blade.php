@extends('layouts.main')

@section('title', 'Forgot password')


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
						{!! Form::open(['url' => 'password/email', 'method' => 'POST']) !!}

							<div class="form-group">
								{!! Form::label('email', 'Email address:', ['class' => 'form-control-label']) !!}
								{!! Form::email('email', null, ['class' => 'form-control']) !!}
							</div>

							<div class="form-group">
								{!! Form::submit('Reset password', ['class' => 'btn btn-primary text-center']) !!}
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